<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\SeoMeta;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::findOrFail("1");
        return view('admin.setting.index', compact('setting'));
    }
    public function privacy_policy()
    {
        $setting = Setting::findOrFail("1");
        return view('admin.setting.privacy-policy', compact('setting'));
    }
    public function term_and_condition()
    {
        $setting = Setting::findOrFail("1");
        return view('admin.setting.term-and-condition', compact('setting'));
    }

    public function store(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'store_name' => 'required|string',
            'slogan' => 'nullable|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'wa_number' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:' . config('settings.max_image_file_size', 10240)
        ]);
        if ($validator->fails()) {
            return redirect()->route("cms.setting")->withErrors($validator->errors());
        }
        $setting = Setting::findOrFail("1");
        $setting->fill($r->except('_token'));
        $setting->save();

        if ($r->hasFile('logo')) {
            $setting->clearMediaCollection('logo');
            $setting->addMediaFromRequest('logo')
                ->toMediaCollection('logo', 'public');
        }

        return redirect()->route('admin.setting.index')->with('ok', 'Site settings have been updated successfully');
    }

    public function privacy_policy_store(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'privacy_policy' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->route("admin.setting.privacy_policy")->withErrors($validator->errors());
        }
        $setting = Setting::findOrFail("1");
        $setting->fill($r->except('_token'));
        $setting->save();

        return redirect()->route('admin.setting.privacy_policy')->with('ok', 'Privacy policy has been updated successfully');
    }
    public function term_and_condition_post(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'term_and_condition' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->route("cms.setting.term_and_condition")->withErrors($validator->errors());
        }
        $setting = Setting::findOrFail("1");
        $setting->fill($r->except('_token'));
        $setting->save();

        return redirect()->route('admin.setting.term_and_condition')->with('ok', 'Term and condition has been updated successfully');
    }
    public function seo(Request $request)
    {
        // Ambil semua data SEO Meta
        $seoMetas = SeoMeta::all();
        return view('admin.setting.seo', compact('seoMetas'));
    }

    public function seo_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $seoMeta = SeoMeta::findOrFail($id);
        $seoMeta->meta_title = $request->meta_title;
        $seoMeta->meta_description = $request->meta_description;
        $seoMeta->meta_keywords = $request->meta_keywords;

        // Handle upload gambar menggunakan Spatie Media Library dan simpan di meta_image
        if ($request->hasFile('image')) {
            // Hapus media lama jika ada
            if ($seoMeta->getFirstMedia('meta_image')) {
                $seoMeta->clearMediaCollection('meta_image');
            }
            $media = $seoMeta->addMediaFromRequest('image')->toMediaCollection('meta_image');
            $seoMeta->meta_image = $media->getUrl();
        }

        $seoMeta->save();

        return redirect()->route('admin.setting.seo')->with('ok', 'SEO meta has been successfully updated');
    }
}
