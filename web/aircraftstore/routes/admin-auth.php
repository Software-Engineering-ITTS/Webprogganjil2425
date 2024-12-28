<?php

use App\Http\Controllers\AircraftController;
use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Controllers\Auth\Admin\RegisteredController;
use Illuminate\Support\Facades\Route;

// Grup route untuk admin tamu (belum login)
Route::prefix('admin')->middleware('guest:admin')->group(function () {

    Route::get('register', [RegisteredController::class, 'create'])->name('admin.register');
    Route::post('register', [RegisteredController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [LoginController::class, 'store']);
});

// Grup route untuk admin yang sudah login
Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Route untuk menampilkan form tambah produk
    Route::get('/addproduct', function () {
        return view('admin.addproduct.form');
    })->name('admin.addproduct');

    // Route untuk menyimpan data produk
    Route::post('/addproduct', [AircraftController::class, 'store'])
        ->name('admin.addproduct.submit');

    Route::get('/history', function () {
        return view('admin.history');
    })->name('admin.history');

    Route::get('/listproduct', function () {
        return view('admin.listproduct');
    })->name('admin.listproduct');

    // Logout admin
    Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');
});
