<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\GalleryProductController;

// Guest routes (login)
Route::middleware('guest')->group(function () {
    Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
});

// Admin protected routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
});



Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('gallery', GalleryProductController::class);
});


//  products routes
Route::resource('products', ProductController::class);


// Route::view('/', 'pages.home');
// Route::view('/about', 'pages.about');
 Route::view('/dashboard', 'pages.dashboard')->name('dashboard');

 



