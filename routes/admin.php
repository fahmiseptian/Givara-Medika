<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('setting/privacy-policy', [SettingController::class, 'privacy_policy'])
        ->name('setting.privacy_policy');
    Route::post('setting/privacy-policy-store', [SettingController::class, 'privacy_policy_store'])
        ->name('setting.privacy_policy_store');
    Route::get('setting/term-and-condition', [SettingController::class, 'term_and_condition'])
        ->name('setting.term_and_condition');
    Route::post('setting/term-and-condition-store', [SettingController::class, 'term_and_condition_store'])
        ->name('setting.term_and_condition_store');

    Route::resource('setting', SettingController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
