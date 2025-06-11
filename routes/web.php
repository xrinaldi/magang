<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Middleware\AdminAuth;
use App\Http\Controllers\PromoController;

// Public routes (READ-ONLY for users)
Route::get('/', [NewsController::class, 'getLastNews']);

// Public news routes - ONLY READ access for users
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

// Cart route
Route::get('/cart', function () {
    return view('pages.cart.index');
})->name('cart');

// Space routes (existing)
Route::get('/space/funroom', [SpaceController::class, 'funroom'])->name('space.funroom');
Route::get('/space/garden', [SpaceController::class, 'garden'])->name('space.garden');
Route::get('/space/meeting', [SpaceController::class, 'meeting'])->name('space.meeting');

Route::get('/promo/coffeetime', [PromoController::class, 'coffeetime'])->name('promo.coffeetime');
Route::get('/promo/student', [PromoController::class, 'student'])->name('promo.student');
Route::get('/promo/specialmenu', [PromoController::class, 'specialmenu'])->name('promo.specialmenu');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest admin routes (not authenticated)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login']);
    });
    // Authenticated admin routes - ONLY admins can create/edit/delete
    Route::middleware(AdminAuth::class)->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        // News management routes - ADMIN ONLY
        Route::resource('news', AdminNewsController::class);
    });
});