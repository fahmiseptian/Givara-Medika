<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorContent;
use App\Models\DoctorPage;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display the doctor content management page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve the doctor page data, assumed to have only one entry with ID 1
        $doctorPage = DoctorPage::findOrFail(1);
        return view('admin.doctor.index', compact('doctorPage'));
    }

    /**
     * Update the doctor page content.
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

        return redirect()->route('admin.doctor')->with('success', 'Doctor page content has been updated successfully.');
    }

    /**
     * Display the doctor content page.
     *
     * @return \Illuminate\View\View
     */
    public function content()
    {
        // Retrieve the doctor content, assumed to have only one entry
        $doctorPage = DoctorContent::first();
        if (!$doctorPage) {
            // If not exists, create default
            $doctorPage = DoctorContent::create([
                'title' => 'Doctor Page Title',
                'description' => 'Doctor page description here.',
                'content' => 'Doctor page content here.',
            ]);
        }
        return view('admin.doctor.content', compact('doctorPage'));
    }

    /**
     * Update the doctor content page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contentUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        $doctorPage = DoctorContent::findOrFail($id);
        $doctorPage->title = $request->title;
        $doctorPage->description = $request->description;
        $doctorPage->content = $request->content;
        $doctorPage->save();

        return redirect()->route('admin.doctor.content')->with('success', 'Doctor content has been updated successfully.');
    }

    /**
     * Display the list of all doctors.
     *
     * @return \Illuminate\View\View
     */
    public function listDoctors()
    {
        // Assume Doctor model exists and has relation with Spatie Media Library
        $doctors = Doctor::all();
        return view('admin.doctor.table', compact('doctors'));
    }

    /**
     * Show the form to create a new doctor.
     *
     * @return \Illuminate\View\View
     */
    public function createDoctor()
    {
        return view('admin.doctor.form');
    }

    /**
     * Store a new doctor in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeDoctor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
        ]);

        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->content = $request->description;
        $doctor->save();

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $doctor->addMediaFromRequest('image')->toMediaCollection('doctor_images');
        }

        return redirect()->route('admin.doctor.list')->with('success', 'Doctor has been added successfully.');
    }

    /**
     * Show the form to edit an existing doctor.
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
     * Update doctor data in the database.
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->name = $request->name;
        $doctor->content = $request->description;
        $doctor->save();

        // Handle image update if exists
        if ($request->hasFile('image')) {
            // Remove previous image if exists
            $doctor->clearMediaCollection('doctor_images');
            // Add new image
            $doctor->addMediaFromRequest('image')->toMediaCollection('doctor_images');
        }

        return redirect()->route('admin.doctor.list')->with('success', 'Doctor data has been updated successfully.');
    }

    /**
     * Delete a doctor from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('admin.doctor.list')->with('success', 'Doctor has been deleted successfully.');
    }
}
