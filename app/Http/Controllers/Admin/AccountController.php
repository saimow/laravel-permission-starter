<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index(){
        return view('admin.account');
    }

    public function update(Request $request){
        if(isset($request->info)){
            $request->validate([
                'name' => ['required','min:4', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:users,email,'.auth()->user()->id],
            ]);

            $user = auth()->user();

            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

            return back()->with('success', 'Your account has been updated successfully.');;
        }

        if(isset($request->password)){
            $request->validate([
                'old_password' => ['required','min:8', 'max:255'],
                'new_password' => ['required', 'min:8', 'max:255', 'confirmed'],
            ]);

            $user = auth()->user();

            if(Hash::check($request->old_password, $user->password)){
                $user->update([
                    'password' => Hash::make($request->new_password)
                ]);
                return back()->with('success', 'The Password has been updated successfully.');
            }

            return back()->withErrors(['old_password' => 'Password is invalid'])->onlyInput('old_password');
        }
    }
}
