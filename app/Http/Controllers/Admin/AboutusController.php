<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\aboutus; // Menggunakan model 'aboutus' sesuai dengan nama file dan konteks
use Illuminate\Support\Facades\Redirect;

class AboutusController extends Controller
{
    /**
     * Menampilkan form pengeditan konten About Us.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil record About Us pertama. Jika tidak ada, buat record baru dengan nilai default.
        $aboutus = aboutus::findOrFail(1);

        return view('admin.aboutus', compact('aboutus'));
    }

    /**
     * Memperbarui resource About Us yang ditentukan di penyimpanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\aboutus  $aboutus
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'banner1' => 'nullable|image|mimes:jpeg,png,svg,gif|max:4096', // Maksimal 4MB
            'banner2' => 'nullable|image|mimes:jpeg,png,svg,gif|max:4096',
            'banner3' => 'nullable|image|mimes:jpeg,png,svg,gif|max:4096',
            'icon1' => 'nullable|string|max:255',
            'text1' => 'nullable|string|max:255',
            'icon2' => 'nullable|string|max:255',
            'text2' => 'nullable|string|max:255',
            'icon3' => 'nullable|string|max:255',
            'text3' => 'nullable|string|max:255',
            'icon4' => 'nullable|string|max:255',
            'text4' => 'nullable|string|max:255',
        ]);

        // Perbarui kolom teks
        $aboutus = aboutus::findOrFail(1);
        $aboutus->update([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'icon1' => $validatedData['icon1'],
            'text1' => $validatedData['text1'],
            'icon2' => $validatedData['icon2'],
            'text2' => $validatedData['text2'],
            'icon3' => $validatedData['icon3'],
            'text3' => $validatedData['text3'],
            'icon4' => $validatedData['icon4'],
            'text4' => $validatedData['text4'],
        ]);

        // Tangani unggahan banner menggunakan Spatie Media Library
        if ($request->hasFile('banner1')) {
            $aboutus->clearMediaCollection('banner1'); // Hapus banner yang ada
            $aboutus->addMediaFromRequest('banner1')->toMediaCollection('banner1');
        }

        if ($request->hasFile('banner2')) {
            $aboutus->clearMediaCollection('banner2');
            $aboutus->addMediaFromRequest('banner2')->toMediaCollection('banner2');
        }

        if ($request->hasFile('banner3')) {
            $aboutus->clearMediaCollection('banner3');
            $aboutus->addMediaFromRequest('banner3')->toMediaCollection('banner3');
        }

        return Redirect::route('admin.aboutus')->with('success', 'Konten About Us berhasil diperbarui.');
    }
}
