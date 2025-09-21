<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard;
use App\Models\Headline;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboard = Dashboard::findOrFail(1);
        return view('admin.dashboard', ['dashboard' => $dashboard]);
    }

    public function headline()
    {
        $headlines = Headline::all();
        return view('admin.headline', ['headlines' => $headlines]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $dashboard = Dashboard::findOrFail($id);

        $dashboard->title = $request->title;
        $dashboard->content = $request->content;
        $dashboard->save();

        if ($request->hasFile('banner')) {
            // Remove previous banner if exists
            $dashboard->clearMediaCollection('banner');
            // Add new banner
            $dashboard->addMediaFromRequest('banner')->toMediaCollection('banner');
        }

        return redirect()->route('admin.dashboard')->with('success', 'Dashboard content has been updated successfully.');
    }

    public function updateHeadline(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'content' => 'nullable|string',
        ]);

        $headline = Headline::findOrFail($id);

        $headline->title = $request->title;
        $headline->icon = $request->icon;
        $headline->content = $request->content;
        $headline->save();

        return redirect()->route('admin.headline')->with('success', 'Headline content has been updated successfully.');
    }
}
