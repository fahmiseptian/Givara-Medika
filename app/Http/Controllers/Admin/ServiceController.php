<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceContent;
use App\Models\ServicePage;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        return view('admin.service.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $service = Service::create([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'description' => $request->description,
        ]);

        if ($request->hasFile('banner')) {
            $service->addMediaFromRequest('banner')->toMediaCollection('banner');
        }

        return redirect()->route('admin.service.index')->with('success', 'Service has been added successfully.');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.service.form', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $service = Service::findOrFail($id);
        $service->name = $request->name;
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->save();

        if ($request->hasFile('banner')) {
            $service->clearMediaCollection('banner');
            $service->addMediaFromRequest('banner')->toMediaCollection('banner');
        }

        return redirect()->route('admin.service.index')->with('success', 'Service has been updated successfully.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->clearMediaCollection('banner');
        $service->delete();

        return redirect()->route('admin.service.index')->with('success', 'Service has been deleted successfully.');
    }

    /**
     * Show the edit form for the service page (servicePage).
     */
    public function page()
    {
        // Assume there is only one servicePage, can be retrieved by fixed id or first()
        $servicePage = ServicePage::first();
        if (!$servicePage) {
            // If not exists, create default
            $servicePage = ServicePage::create([
                'title' => 'Service Page Title',
                'content' => 'Service page content here.',
            ]);
        }
        return view('admin.service.page', compact('servicePage'));
    }

    /**
     * Update the service page content (servicePage).
     */
    public function updatePage(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);

        $servicePage = ServicePage::findOrFail($id);
        $servicePage->title = $request->title;
        $servicePage->content = $request->content;
        $servicePage->save();

        return redirect()->route('admin.service.page')->with('success', 'Service page content has been updated successfully.');
    }

    public function content()
    {
        // Assume there is only one aboutusPage, can be retrieved by fixed id or first()
        $serviceContent = ServiceContent::first();
        if (!$serviceContent) {
            // If not exists, create default
            $serviceContent = ServiceContent::create([
                'title' => 'About Us Page Title',
                'content' => 'About Us page content here.',
            ]);
        }
        return view('admin.service.detail', compact('serviceContent'));
    }

    /**
     * Update the aboutusPage content.
     */
    public function updateContent(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $serviceContent = ServiceContent::findOrFail($id);
        $serviceContent->title = $request->title;
        $serviceContent->content = $request->content;
        $serviceContent->save();

        // Save banner image if uploaded, using Spatie Media Library
        if ($request->hasFile('banner')) {
            $serviceContent->clearMediaCollection('banner');
            $serviceContent->addMediaFromRequest('banner')->toMediaCollection('banner');
        }

        return redirect()->route('admin.service.content')->with('success', 'About Us page content has been updated successfully.');
    }
}
