<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactus;
use App\Models\Form;

class ContactusController extends Controller
{
    // Tampilkan halaman edit konten Contact Us
    public function index()
    {
        $contactus = Contactus::all();
        return view('admin.contactus.index', compact('contactus'));
    }

    // Update konten Contact Us
    public function update(Request $request, $id)
    {
        $request->validate([
            'title1' => 'required|string|max:255',
            'content1' => 'required|string',
            'title2' => 'required|string|max:255',
            'content2' => 'required|string',
            'title3' => 'required|string|max:255',
            'content3' => 'required|string',
        ]);

        // Update semua data Contactus (total 3 data, masing-masing 1 title & 1 content)
        for ($i = 1; $i <= 3; $i++) {
            $contactus = Contactus::findOrFail($i);
            $contactus->title = $request->input('title' . $i);
            $contactus->content = $request->input('content' . $i);
            $contactus->save();
        }

        return redirect()->route('admin.contactus.index')->with('success', 'Konten Contact Us berhasil diperbarui.');
    }

    // Tampilkan hasil form Contact Us
    public function form()
    {
        $forms = Form::orderBy('created_at', 'desc')->get();
        return view('admin.contactus.form', compact('forms'));
    }

    // Hapus satu entri form Contact Us
    public function deleteForm($id)
    {
        $form = Form::findOrFail($id);
        $form->delete();

        return redirect()->route('admin.contactus.form')->with('success', 'Message deleted successfully.');
    }
}
