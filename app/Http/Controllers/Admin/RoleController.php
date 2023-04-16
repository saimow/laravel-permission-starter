<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RoleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(RoleDataTable $dataTable){
        return $dataTable->render('admin.roles.index');
    }

    public function create(){
        $this->authorize('role-create');

        $permissionsData = Permission::get();

        $permissions = [];
        foreach($permissionsData as $permission){
            array_push($permissions, $permission['name']);
        }

        return view('admin.roles.create', ['permissions' => $permissions]);
    }

    public function store(Request $request){
        $this->authorize('role-create');

        $request->validate([
            'name' => 'required|max:255|unique:roles,name',
            'permissions.*' => 'required|max:255'
        ]);

        $role = Role::create(['name' => $request->name]);

        $role->givePermissionTo($request->permissions);

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role){
        $this->authorize('role-edit');

        $permissionsData = Permission::get();
        $rolePermissionsData = $role->permissions()->get();

        $permissions = [];
        foreach($permissionsData as $permission){
            array_push($permissions, $permission['name']);
        }

        $rolePermissions = [];
        foreach($rolePermissionsData as $permission){
            array_push($rolePermissions, $permission['name']);
        }

        return view('admin.roles.edit', ['role' => $role, 'permissions' => $permissions, 'rolePermissions' => $rolePermissions]);
    }

    public function update(Role $role, Request $request){
        $this->authorize('role-edit');
        
        $request->validate([
            'name' => 'required|max:255|unique:roles,name,'.$role->id,
            'permissions.*' => 'required|max:255'
        ]);

        $role->update(['name' => $request->name]);

        $role->syncPermissions($request->permissions);

        return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $role){
        $this->authorize('role-delete');

        $role->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
