<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('app');
});

Route::get('/pendaftaran', function () {
    return view('pendaftaran');
});

Route::get('/kegiatan', function () {
    return view('form');
});

Route::get('/kehadiran', function () {
    return view('kehadiran');
});
