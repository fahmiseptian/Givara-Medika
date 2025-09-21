<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\ReviewPage;

class ReviewController extends Controller
{
    // Display the list of reviews and the review page
    public function index()
    {
        $reviews = Review::latest()->get();
        return view('admin.review.index', compact('reviews'));
    }

    // Show the edit form for the review page
    public function editPage()
    {
        $reviewPage = ReviewPage::first();
        if (!$reviewPage) {
            // If not exists, create default
            $reviewPage = ReviewPage::create([
                'title' => 'Page Title',
                'content' => 'Page content here.',
            ]);
        }
        return view('admin.review.page', compact('reviewPage'));
    }

    // Update the review page content
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

        return redirect()->back()->with('success', 'Review page content has been updated successfully.');
    }

    // CRUD for Review (optional, simple example)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'star' => 'required|integer|min:1|max:5',
            'content' => 'nullable|string',
            'profile_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Save review data without image first
        $review = Review::create($request->only('name', 'star', 'content'));

        // If there is a profile_url file, upload it using Spatie
        if ($request->hasFile('profile_url')) {
            $review->addMediaFromRequest('profile_url')->toMediaCollection('profile');
        }

        return redirect()->back()->with('success', 'Review has been added successfully.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Review has been deleted successfully.');
    }
}
