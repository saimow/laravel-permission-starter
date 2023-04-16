<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'admin-dashboard-access',
            'permission-access',
            'role-access',
            'role-create',
            'role-edit',
            'role-delete',
            'user-access',
            'user-edit',
            'user-delete',
            'post-access',
            'post-create',
            'post-edit',
            'post-delete',
        ];

        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);
        }
        
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        $adminRole->givePermissionTo($permissions);

        User::where('id', 1)->first()->assignRole($adminRole);
        User::where('id', 2)->first()->assignRole($userRole);
    }
}
