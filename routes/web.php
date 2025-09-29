<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\SeoMeta;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/about', function () {
    return view('frontend.aboutus');
});
Route::get('/doctors', function () {
    return view('frontend.doctors');
});
Route::get('/services', function () {
    return view('frontend.service');
});
Route::get('/reviews', function () {
    return view('frontend.review');
});
Route::get('/contact', function () {
    return view('frontend.contactus');
});

// Route untuk halaman Term and Condition
Route::get('/terms-conditions', function () {
    return view('frontend.term_and_condition');
})->name('term_and_condition');

// Route untuk halaman Privacy Policy
Route::get('/privacy-policy', function () {
    return view('frontend.PrivacyPolicy');
})->name('privacy_policy');


Route::post('/contact', [UserController::class, 'submitContactForm'])->name('contact.form');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';

Route::get('/route-list', function () {
    Artisan::call('route:list');
    return "<pre>" . Artisan::output() . "</pre>";
})->name('route.list');


Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cache, config, route, and view cleared!";
});

Route::get('/optimize', function () {
    Artisan::call('optimize:clear');
    Artisan::call('optimize');
    return "Application optimized!";
});

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return "Storage linked!";
});

Route::get('/generate-sitemap', function () {
    $sitemap = Sitemap::create();
    $pages = SeoMeta::all();

    foreach ($pages as $page) {
        $sitemap->add(
            Url::create(url($page->page === 'home' ? '/' : $page->page))
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.8)
        );
    }
    $sitemap->writeToFile(public_path('sitemap.xml'));
    return "✅ Sitemap berhasil dibuat: " . url('sitemap.xml');
});
