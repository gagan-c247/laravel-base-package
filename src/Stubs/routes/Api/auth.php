<?php

use App\Http\Controllers\Admin\Api\AuthController;
use App\Http\Controllers\Admin\Api\SettingsController;
use App\Http\Middleware\EnforceJson;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Support\Facades\Route;
//set a middleware to force json header for check in the controller
Route::middleware(EnforceJson::class)->prefix('admin')->group(function () {
    // admin login route
    Route::post('/login', [AuthController::class, 'login'])->name('api.admin.login');
    // admin reset password route
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('api.admin.reset-password');
    Route::middleware(JwtMiddleware::class)->group(function () {
        //logout api
        Route::post('/logout', [AuthController::class, 'logout'])->name('api.admin.logout');
        //change password api with in the admin
        Route::post('/change-password', [AuthController::class, 'changePassword'])->name('api.admin.change-password');
        // update profile this api require form data instead of json because of display image
        Route::post('/update-profile', [AuthController::class, 'updateProfile'])->name('api.admin.update-profile');
        // get profile details
        Route::get('/profile', [AuthController::class, 'profile'])->name('api.admin.profile');
        Route::get('get-settings', [SettingsController::class, 'getSetting'])->name('api.admin.get-settings');
        Route::post('update-settings', [SettingsController::class, 'updateSetting'])->name('api.admin.update-settings');
    });
});
