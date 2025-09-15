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

        return redirect()->route('admin.service.index')->with('success', 'Layanan berhasil ditambahkan.');
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

        return redirect()->route('admin.service.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->clearMediaCollection('banner');
        $service->delete();

        return redirect()->route('admin.service.index')->with('success', 'Layanan berhasil dihapus.');
    }

    /**
     * Menampilkan form edit halaman service (servicePage).
     */
    public function page()
    {
        // Asumsi hanya ada satu halaman servicePage, bisa diambil dengan id tetap atau first()
        $servicePage = ServicePage::first();
        if (!$servicePage) {
            // Jika belum ada, buat default
            $servicePage = ServicePage::create([
                'title' => 'Judul Halaman Service',
                'content' => 'Konten halaman service di sini.',
            ]);
        }
        return view('admin.service.page', compact('servicePage'));
    }

    /**
     * Update konten halaman service (servicePage).
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

        return redirect()->route('admin.service.page')->with('success', 'Konten halaman service berhasil diperbarui.');
    }

    public function content()
    {
        // Asumsi hanya ada satu halaman aboutusPage, bisa diambil dengan id tetap atau first()
        $serviceContent = ServiceContent::first();
        if (!$serviceContent) {
            // Jika belum ada, buat default
            $serviceContent = ServiceContent::create([
                'title' => 'Judul Halaman About Us',
                'content' => 'Konten halaman About Us di sini.',
            ]);
        }
        return view('admin.service.detail', compact('serviceContent'));
    }

    /**
     * Update konten halaman aboutusPage.
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

        // Simpan gambar banner jika ada upload, menggunakan Spatie Media Library
        if ($request->hasFile('banner')) {
            $serviceContent->clearMediaCollection('banner');
            $serviceContent->addMediaFromRequest('banner')->toMediaCollection('banner');
        }

        return redirect()->route('admin.service.content')->with('success', 'Konten halaman About Us berhasil diperbarui.');
    }
}
