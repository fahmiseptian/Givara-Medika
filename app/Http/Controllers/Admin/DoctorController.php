<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorPage;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Menampilkan halaman manajemen konten dokter.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil data halaman dokter, diasumsikan hanya ada satu entri dengan ID 1
        $doctorPage = DoctorPage::findOrFail(1);
        return view('admin.doctor.index', compact('doctorPage'));
    }

    /**
     * Memperbarui konten halaman dokter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);

        $doctorPage = DoctorPage::findOrFail($id);
        $doctorPage->title = $request->title;
        $doctorPage->content = $request->content;
        $doctorPage->save();

        return redirect()->route('admin.doctor')->with('success', 'Konten halaman dokter berhasil diperbarui.');
    }

    /**
     * Menampilkan daftar semua dokter.
     *
     * @return \Illuminate\View\View
     */
    public function listDoctors()
    {
        // Asumsi model Doctor ada dan memiliki relasi dengan Spatie Media Library
        $doctors = Doctor::all();
        return view('admin.doctor.table', compact('doctors'));
    }

    /**
     * Menampilkan form untuk membuat dokter baru.
     *
     * @return \Illuminate\View\View
     */
    public function createDoctor()
    {
        return view('admin.doctor.form');
    }

    /**
     * Menyimpan dokter baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeDoctor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk gambar
        ]);

        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->content = $request->description;
        $doctor->save();

        // Handle upload gambar jika ada
        if ($request->hasFile('image')) {
            $doctor->addMediaFromRequest('image')->toMediaCollection('doctor_images');
        }

        return redirect()->route('admin.doctor.list')->with('success', 'Dokter berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit dokter yang sudah ada.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function editDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctor.form', compact('doctor'));
    }

    /**
     * Memperbarui data dokter di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateDoctor(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk gambar
        ]);


        $doctor = Doctor::findOrFail($id);
        $doctor->name = $request->name;
        $doctor->content = $request->description;
        $doctor->save();

        // Handle update gambar jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar yang ada sebelumnya jika ada
            $doctor->clearMediaCollection('doctor_images');
            // Tambahkan gambar baru
            $doctor->addMediaFromRequest('image')->toMediaCollection('doctor_images');
        }

        return redirect()->route('admin.doctor.list')->with('success', 'Data dokter berhasil diperbarui.');
    }

    /**
     * Menghapus dokter dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('admin.doctor.list')->with('success', 'Dokter berhasil dihapus.');
    }
}
