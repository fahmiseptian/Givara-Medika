<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\ReviewPage;

class ReviewController extends Controller
{
    // Menampilkan daftar review dan halaman review page
    public function index()
    {
        $reviews = Review::latest()->get();
        return view('admin.review.index', compact('reviews'));
    }

    // Menampilkan form edit untuk review page
    public function editPage()
    {
        $reviewPage = ReviewPage::first();
        if (!$reviewPage) {
            // Jika belum ada, buat default
            $serviceContent = reviewPage::create([
                'title' => 'Judul Halaman ',
                'content' => 'Konten halaman di sini.',
            ]);
        }
        return view('admin.review.page', compact('reviewPage'));
    }

    // Update konten review page
    public function updatePage(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);

        $reviewPage = ReviewPage::findOrFail(1);
        $reviewPage->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Konten halaman review berhasil diperbarui.');
    }

    // CRUD untuk Review (opsional, contoh sederhana)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'star' => 'required|integer|min:1|max:5',
            'content' => 'nullable|string',
        ]);

        Review::create($request->only('name', 'star', 'content'));

        return redirect()->back()->with('success', 'Review berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Review berhasil dihapus.');
    }
}
