<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// Redirect ke dashboard sesuai role
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('user.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/create-event', [AdminController::class, 'createEvent'])->name('admin.createEvent');
    Route::get('/admin/manage-event/{event}', [AdminController::class, 'manageEvent'])->name('admin.manageEvent');
    Route::post('/admin/confirm-attendance/{registration}', [AdminController::class, 'confirmAttendance'])->name('admin.confirmAttendance');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::post('/user/register/{event}', [UserController::class, 'register'])->name('user.register');
    Route::post('/user/confirm-attendance', [UserController::class, 'confirmAttendance'])->name('user.confirm');
});
Route::get('/test', function () {
    return 'Route is working!';
});

use App\Http\Controllers\AuthController;

// Route Login (tidak menggunakan middleware auth)
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Proteksi Rute Admin
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Proteksi Rute User
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});

Route::get('/debug-admin', function () {
    return \App\Http\Controllers\AdminController::class;
});

use Illuminate\Support\Facades\Log;

Route::get('/debug-admin', function () {
    try {
        return \App\Http\Controllers\AdminController::class;
    } catch (\Throwable $e) {
        Log::error($e->getMessage());
        return $e->getMessage();
    }
});
require __DIR__.'/auth.php';
