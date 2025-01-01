<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// Route User
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::post('/user/register/{event}', [UserController::class, 'register'])->name('user.register');
    Route::post('/user/confirm-attendance', [UserController::class, 'confirmAttendance'])->name('user.confirm');
});

// Route Admin
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/create-event', [AdminController::class, 'createEvent'])->name('admin.createEvent');
    Route::get('/admin/manage-event/{event}', [AdminController::class, 'manageEvent'])->name('admin.manageEvent');
    Route::post('/admin/confirm-attendance/{registration}', [AdminController::class, 'confirmAttendance'])->name('admin.confirmAttendance');
});

Route::get('/test', function () {
    return 'Route is working!';
});

require __DIR__.'/auth.php';
