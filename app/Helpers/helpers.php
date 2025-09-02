<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    function setting()
    {
        $setting = Setting::latest()->first();
        return $setting;
    }
}
