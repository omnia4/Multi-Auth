<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RolesController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);

        Role::create($request->all());

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $role->update($request->all());

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
    // public function assignPermission(Request $request, $roleId)
    // {
    //     $role = Role::findOrFail($roleId);
    //     $permissionId = $request->permission_id; // Assuming the permission ID is passed in the request
    //     $role->permissions()->attach($permissionId);

    //     return redirect()->route('roles.index')->with('success', 'Permission assigned successfully.');
    // }
    // public function showAssignPerForm($role)
    // {
    //     $role = Role::findOrFail($role);
    //     $permissions = Permission::all(); 
    
    //     return view('roles.assign-permission', compact('permissions', 'role'));
    // }
    public function showAssignPermissionForm($roleId)
{
    $role = Role::findOrFail($roleId);
    $permissions = Permission::all();

    return view('roles.assign_permission', compact('role', 'permissions'));
}
}
