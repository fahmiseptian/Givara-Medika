<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Display the list of admin users
    public function index()
    {
        $users = User::all();
        return view('admin.user.user', compact('users'));
    }

    // Show the form to add a new user
    public function create()
    {
        return view('admin.user.form');
    }

    // Store a new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = 'admin';
        $user->password = bcrypt($validated['password']);
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'User has been added successfully.');
    }

    // Show the form to edit a user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.form', compact('user'));
    }

    // Update user data
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:6',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // If password is filled, update password
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }

        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'User has been updated successfully.');
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User has been deleted successfully.');
    }
}
