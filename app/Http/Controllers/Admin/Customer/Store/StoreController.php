<?php

namespace App\Http\Controllers\Admin\Customer\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class StoreController extends Controller
{
    // Menampilkan daftar member
    public function index()
    {
        $stores = User::where('role', 'store')->get();
        return view('admin.customer.store.index', compact('stores'));
    }

    // Menampilkan form untuk membuat member baru
    public function create()
    {
        return view('admin.customer.store.form');
    }

    // Menyimpan member baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            // add more validation as needed
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'store';
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('admin.store.index')
            ->with('ok', 'Store has been added successfully.');
    }

    // Menampilkan form edit member
    public function edit($id)
    {
        $member = User::findOrFail($id);
        return view('admin.customer.store.form', compact('member'));
    }

    // Mengupdate data member
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            // add more validation as needed
        ]);

        $member = User::findOrFail($id);
        $member->update($request->all());

        return redirect()->route('admin.store.index')
            ->with('success', 'Store has been updated successfully.');
    }

    public function destroy($id)
    {
        $member = User::findOrFail($id);
        $member->delete();

        return redirect()->route('admin.store.index')
            ->with('success', 'Store has been deleted successfully.');
    }
}
