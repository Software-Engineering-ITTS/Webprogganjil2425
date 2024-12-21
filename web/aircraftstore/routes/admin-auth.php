<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Admin\Auth\RegisteredUserController as AdminRegisteredController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\LoginController;

Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('admin.register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('admin.login');

    Route::post('login', [LoginController::class, 'store']);
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::get('/admin.dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth', 'verified'])->name('admin.dashboard');

    Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');
});
