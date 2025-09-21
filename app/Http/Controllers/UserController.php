<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class UserController extends Controller
{
    /**
     * Menangani pengiriman form Contact Us dari frontend.
     */
    public function submitContactForm(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
            'website' => 'nullable|string|max:0', // Honeypot anti-bot
        ]);

        // Jika honeypot terisi, abaikan (anggap spam)
        if ($request->filled('website')) {
            return back()->withErrors(['error' => 'Terjadi kesalahan.'])->withInput();
        }

        // Simpan data ke tabel forms
        Form::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        // Redirect kembali dengan pesan sukses
        return back()->with('success', 'Pesan Anda berhasil dikirim. Terima kasih telah menghubungi kami!');
    }
}
