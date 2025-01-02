<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// Admin Routes
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

// User Routes
Route::middleware('auth')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');
});

// Authentication Routes (default dari Laravel Breeze)
require __DIR__.'/auth.php';

use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [EventController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/admin/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
    Route::post('/admin/registrations/verify', [RegistrationController::class, 'verify'])->name('registrations.verify');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/events', [EventController::class, 'list'])->name('events.list');
    Route::post('/events/register', [RegistrationController::class, 'register'])->name('events.register');
    Route::post('/events/attendance', [RegistrationController::class, 'submitAttendance'])->name('attendance.submit');
});
