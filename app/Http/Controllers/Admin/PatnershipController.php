<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patnership;
use Illuminate\Http\Request;

class PatnershipController extends Controller
{
    // Tampilkan daftar patnership
    public function index()
    {
        $patnerships = Patnership::all();
        return view('admin.patnership.index', compact('patnerships'));
    }

    // Tampilkan form tambah patnership
    public function create()
    {
        return view('admin.patnership.form');
    }

    // Simpan patnership baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'telp' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $patnership = Patnership::create([
            'name' => $request->name,
            'telp' => $request->telp,
            'email' => $request->email,
            'website' => $request->website,
            'address' => $request->address,
        ]);

        if ($request->hasFile('logo')) {
            $patnership->addMediaFromRequest('logo')->toMediaCollection('logo');
        }

        return redirect()->route('admin.patnership.index')->with('success', 'Patnership berhasil ditambahkan.');
    }

    // Tampilkan form edit patnership
    public function edit($id)
    {
        $patnership = Patnership::findOrFail($id);
        return view('admin.patnership.form', compact('patnership'));
    }

    // Update patnership
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'telp' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $patnership = Patnership::findOrFail($id);
        $patnership->name = $request->name;
        $patnership->telp = $request->telp;
        $patnership->email = $request->email;
        $patnership->website = $request->website;
        $patnership->address = $request->address;
        $patnership->save();

        if ($request->hasFile('logo')) {
            $patnership->clearMediaCollection('logo');
            $patnership->addMediaFromRequest('logo')->toMediaCollection('logo');
        }

        return redirect()->route('admin.patnership.index')->with('success', 'Patnership berhasil diperbarui.');
    }

    // Hapus patnership
    public function destroy($id)
    {
        $patnership = Patnership::findOrFail($id);
        $patnership->clearMediaCollection('logo');
        $patnership->delete();

        return redirect()->route('admin.patnership.index')->with('success', 'Patnership berhasil dihapus.');
    }
}

