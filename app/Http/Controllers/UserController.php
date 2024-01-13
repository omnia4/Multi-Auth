<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
    
        $user = User::create($validatedData);
    
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
{
    $this->authorize('update', $user);
    if (auth()->id() !== $user->id && $user->id === 1) {
        abort(403);
    }
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
    ]);

    $user->update($validatedData);

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();
    
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

public function assignRole(Request $request, $userId)
{
    $user = User::findOrFail($userId);
    $role = Role::findOrFail($request->role_id);

    $user->roles()->syncWithoutDetaching([$role->id]);

    return back()->with('success', 'Role assigned successfully.');
}
public function showAssignRoleForm($userId)
{
    $user = User::findOrFail($userId);
    $roles = Role::all();

    return view('users.assign_role', compact('user', 'roles'));
}
}
