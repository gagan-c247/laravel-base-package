<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use c247\Codebank\Controllers\NewPasswordController;
use C247\Codebank\Middleware\AdminAuthMiddleware;
use C247\Codebank\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return redirect()->route('admin.login');
});
Route::prefix('admin')->group(function () {
    //login routes
    Route::middleware(RedirectIfAuthenticated::class)->group(function () {
        Route::get('/login', [AuthController::class, 'index'])->name('admin.login');
        Route::post('/login', [AuthController::class, 'login'])->name('admin.login.post');
        Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('admin.forgot-password');
        Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('admin.reset-password');
        Route::get('/reset-password/{token}', [AuthController::class, 'resetPasswordForm'])->name('admin.password.reset');
        Route::post('/store-password', [NewPasswordController::class, 'store'])->name('admin.password.store');
    });
    Route::middleware(AdminAuthMiddleware::class, 'user.active')->group(function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
        //dashboard routes
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('permission:manage_dashboard');
        // profile routes
        Route::get('/profile', [AuthController::class, 'profile'])->name('admin.profile');
        Route::post('/update-profile-picture', [AuthController::class, 'updateProfilePicture'])->name('admin.update-profile-picture');
        Route::post('/delete-profile-picture', [AuthController::class, 'deleteProfilePicture'])->name('admin.delete-profile-picture');
        Route::get('/edit-profile', [AuthController::class, 'editProfile'])->name('admin.edit-profile');
        Route::post('/update-profile', [AuthController::class, 'updateProfile'])->name('admin.update-profile');
        Route::get('/change-password', [AuthController::class, 'editPassword'])->name('admin.edit-password');
        Route::post('/change-password', [AuthController::class, 'changePassword'])->name('admin.change-password');

        // settings routes
        // Route::get('settings', [SettingsController::class, 'getSetting'])->name('admin.get-settings');
        // Route::post('update-settings', [SettingsController::class, 'updateSetting'])->name('admin.update-settings');
        // Route::post('delete-settings', [SettingsController::class, 'deleteSetting'])->name('admin.delete-setting');
    });
});
