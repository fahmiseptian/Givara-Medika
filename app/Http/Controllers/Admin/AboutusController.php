<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutusPage;
use Illuminate\Http\Request;
use App\Models\aboutus;
use Illuminate\Support\Facades\Redirect;

class AboutusController extends Controller
{
    /**
     * Display the About Us content edit form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get the first About Us record. If not exists, create a new one with default values.
        $aboutus = aboutus::findOrFail(1);

        return view('admin.aboutus.index', compact('aboutus'));
    }

    /**
     * Update the specified About Us resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'banner1' => 'nullable|image|mimes:jpeg,png,svg,gif|max:4096', // Max 4MB
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

        // Update text columns
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

        // Handle banner uploads using Spatie Media Library
        if ($request->hasFile('banner1')) {
            $aboutus->clearMediaCollection('banner1');
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

        return Redirect::route('admin.aboutus')->with('success', 'About Us content has been updated successfully.');
    }

    public function page()
    {
        // Assume there is only one aboutusPage, can be retrieved by fixed id or first()
        $aboutusPage = AboutusPage::first();
        if (!$aboutusPage) {
            // If not exists, create default
            $aboutusPage = AboutusPage::create([
                'title' => 'About Us Page Title',
                'content' => 'About Us page content here.',
                'vision_and_mission' => 'About Us page vision and mission here.',
            ]);
        }
        return view('admin.aboutus.detail', compact('aboutusPage'));
    }

    /**
     * Update the aboutusPage content.
     */
    public function updatePage(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'vision_and_mission' => 'nullable|string',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $aboutusPage = AboutusPage::findOrFail($id);
        $aboutusPage->title = $request->title;
        $aboutusPage->content = $request->content;
        $aboutusPage->vision_and_mission = $request->vision_and_mission;
        $aboutusPage->save();

        // Save banner image if uploaded, using Spatie Media Library
        if ($request->hasFile('banner')) {
            $aboutusPage->clearMediaCollection('banner');
            $aboutusPage->addMediaFromRequest('banner')->toMediaCollection('banner');
        }

        return redirect()->route('admin.aboutus.page')->with('success', 'About Us page content has been updated successfully.');
    }
}
