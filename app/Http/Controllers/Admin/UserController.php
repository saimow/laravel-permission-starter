<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(UserDataTable $datatable){
        return $datatable->render('admin.users.index');
    }

    public function edit(User $user){
        $this->authorize('user-edit');

        $rolesData = Role::get();
        $userRolesData = $user->roles()->get();

        $roles = [];
        foreach($rolesData as $role){
            array_push($roles, $role['name']);
        }

        $userRoles = [];
        foreach($userRolesData as $role){
            array_push($userRoles, $role['name']);
        }

        return view('admin.users.edit', ['user'=>$user, 'userRoles'=>$userRoles, 'roles'=>$roles]);
    }

    public function update(User $user, Request $request){
        $this->authorize('user-edit');

        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'roles.*' => ['required', 'max:255'],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        $user->syncRoles([$request->roles]);

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user){
        $this->authorize('user-delete');

        $user->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
