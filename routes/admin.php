<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminNewsController;

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest admin routes (not authenticated)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login']);
    });

    // Authenticated admin routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        
        // News management routes
        Route::resource('news', AdminNewsController::class);
    });
});

// Add this to your main routes/web.php file:
/*
// Include admin routes
require __DIR__.'/admin.php';
*/