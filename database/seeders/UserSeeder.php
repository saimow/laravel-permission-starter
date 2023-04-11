<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Demo Admin',
            'email' =>'admin@demo.com',
            'password' => Hash::make('password'),
            'remember_token' => null,
        ]);

        User::create([
            'name' => 'Demo User',
            'email' =>'user@demo.com',
            'password' => Hash::make('password'),
            'remember_token' => null,
        ]);
    }
}
