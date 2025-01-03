<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReturnController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('/auth/login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // Rute untuk Admin
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('/admin/dashboard', AdminController::class);
        Route::resource('/admin/buku', BookController::class);
    });

    // Rute untuk User
    Route::middleware(['role:user'])->group(function () {
        Route::resource('/home', BookController::class);
    });
});

Route::get('/loans', [LoanController::class, 'create'])->name('loans.create');
Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');
Route::get('/returns', [ReturnController::class, 'create'])->name('returns.create');
Route::post('/returns', [ReturnController::class, 'store'])->name('returns.store');
