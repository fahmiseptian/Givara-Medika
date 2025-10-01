<?php

use App\Http\Controllers\Admin\Customer\Member\MemberController;
use App\Http\Controllers\Admin\Customer\Store\StoreController;
use App\Http\Controllers\Admin\AboutusController;
use App\Http\Controllers\Admin\ContactusController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\PatnershipController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('setting/privacy-policy', [SettingController::class, 'privacy_policy'])
        ->name('setting.privacy_policy');
    Route::post('setting/privacy-policy-store', [SettingController::class, 'privacy_policy_store'])
        ->name('setting.privacy_policy_store');
    Route::get('setting/term-and-condition', [SettingController::class, 'term_and_condition'])
        ->name('setting.term_and_condition');
    Route::post('setting/term-and-condition-store', [SettingController::class, 'term_and_condition_post'])
        ->name('setting.term_and_condition_store');
    // Rute untuk halaman SEO Meta Setting
    Route::get('setting/seo', [SettingController::class, 'seo'])->name('setting.seo');
    Route::put('setting/seo/{id}', [SettingController::class, 'seo_update'])->name('setting.seo_update');
    Route::get('setting/sitemap', function () {
        return view('admin.setting.sitemap');
    })->name('setting.sitemap');

    Route::resource('setting', SettingController::class);

    // Rute untuk manajemen konten halaman dokter (DoctorPage)
    Route::get('/doctor-page', [DoctorController::class, 'index'])->name('doctor');
    Route::put('/doctor-page/update/{id}', [DoctorController::class, 'update'])->name('doctor.update');
    Route::get('/doctor/content', [DoctorController::class, 'content'])->name('doctor.content');
    Route::put('/doctor-page/content/update/{id}', [DoctorController::class, 'contentUpdate'])->name('doctor.update.content');

    // Rute untuk manajemen daftar dokter individual
    Route::get('/doctors', [DoctorController::class, 'listDoctors'])->name('doctor.list');
    Route::get('/doctors/create', [DoctorController::class, 'createDoctor'])->name('doctor.createDoctor');
    Route::post('/doctors', [DoctorController::class, 'storeDoctor'])->name('doctor.storeDoctor');
    Route::get('/doctors/{id}/edit', [DoctorController::class, 'editDoctor'])->name('doctor.editDoctor');
    Route::put('/doctors/{id}', [DoctorController::class, 'updateDoctor'])->name('doctor.updateDoctor');
    Route::get('/doctors/{id}/delete', [DoctorController::class, 'deleteDoctor'])->name('doctor.deleteDoctor');

    // Rute untuk manajemen layanan (Service)
    Route::get('/services', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::get('/services/{id}/delete', [ServiceController::class, 'destroy'])->name('service.destroy');

    // Rute untuk halaman konten utama layanan (Service Page)
    Route::get('/service-page', [ServiceController::class, 'page'])->name('service.page');
    Route::put('/service-page/update/{id}', [ServiceController::class, 'updatePage'])->name('service.updatePage');
    Route::get('/service-page/content', [ServiceController::class, 'content'])->name('service.content');
    Route::put('/service-page/content/update/{id}', [ServiceController::class, 'updateContent'])->name('service.updateContent');


    Route::get('/aboutus', [AboutusController::class, 'index'])->name('aboutus');
    Route::put('/aboutus/update/{id}', [AboutusController::class, 'update'])->name('aboutus.update');
    Route::get('/aboutus/page', [AboutusController::class, 'page'])->name('aboutus.page');
    Route::put('/aboutus/page/{id}', [AboutusController::class, 'updatePage'])->name('aboutus.updatePage');

    Route::get('/headline', [DashboardController::class, 'headline'])->name('headline');
    Route::put('/headline/update/{id}', [DashboardController::class, 'updateHeadline'])->name('headline.update');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/update/{id}', [DashboardController::class, 'update'])->name('dashboard.update');

    Route::resource('member', MemberController::class);
    Route::resource('store', StoreController::class);


    // Rute untuk manajemen review dan halaman review page
    Route::get('/review', [ReviewController::class, 'index'])->name('review');

    // Rute untuk edit dan update konten halaman review page
    Route::get('/review/page/edit', [ReviewController::class, 'editPage'])->name('review.page.edit');
    Route::put('/review/page', [ReviewController::class, 'updatePage'])->name('review.page.update');

    // Rute untuk tambah dan hapus review
    Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
    Route::get('/review/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');

    // Rute untuk manajemen halaman Contact Us
    Route::get('/contactus', [ContactusController::class, 'index'])->name('contactus.index');
    Route::post('/contactus/update/{id}', [ContactusController::class, 'update'])->name('contactus.update');
    Route::get('/contactus/form', [ContactusController::class, 'form'])->name('contactus.form');
    Route::get('/contactus/form/{id}', [ContactusController::class, 'deleteForm'])->name('contactus.form.delete');

    // Rute untuk manajemen user admin
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // Rute untuk manajemen partnership
    Route::get('/patnership', [PatnershipController::class, 'index'])->name('patnership.index');
    Route::get('/patnership/create', [PatnershipController::class, 'create'])->name('patnership.create');
    Route::post('/patnership', [PatnershipController::class, 'store'])->name('patnership.store');
    Route::get('/patnership/{id}/edit', [PatnershipController::class, 'edit'])->name('patnership.edit');
    Route::put('/patnership/{id}', [PatnershipController::class, 'update'])->name('patnership.update');
    Route::get('/patnership/{id}/delete', [PatnershipController::class, 'destroy'])->name('patnership.destroy');
});
