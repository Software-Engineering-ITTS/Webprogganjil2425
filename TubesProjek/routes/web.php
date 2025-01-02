<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IjinMasukController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\RuanganController;

Route::get('/', function () {
    return view('welcome');
});

// Route ke halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Route ke halaman register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');

//Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//manage ruangan
Route::middleware(['auth'])->group(function () {

    Route::prefix('ruangans')->name('ruangans.')->group(function () {
        Route::get('/', [RuanganController::class, 'index'])->name('index');
        Route::get('/create', [RuanganController::class, 'create'])->name('create');
        Route::post('/', [RuanganController::class, 'store'])->name('store');
        Route::get('/{ruangan}/edit', [RuanganController::class, 'edit'])->name('edit');
        Route::put('/{ruangan}', [RuanganController::class, 'update'])->name('update');
        Route::delete('/{ruangan}', [RuanganController::class, 'destroy'])->name('destroy');
    });
    
    Route::prefix('ijin-masuk')->name('ijinMasuks.')->group(function () {
        Route::get('/', [IjinMasukController::class, 'index'])->name('index');
        Route::get('/create', [IjinMasukController::class, 'create'])->name('create');
        Route::post('/', [IjinMasukController::class, 'store'])->name('store');
        Route::get('/approval', [IjinMasukController::class, 'approval'])->name('approval');
        Route::post('/approve/{id}', [IjinMasukController::class, 'approve'])->name('approve');
        Route::post('/reject/{id}', [IjinMasukController::class, 'reject'])->name('reject');
    });
    

    Route::prefix('kegiatans')->name('kegiatans.')->group(function () {
        Route::get('/', [KegiatanController::class, 'index'])->name('index');
        Route::get('/create', [KegiatanController::class, 'create'])->name('create');
        Route::post('/', [KegiatanController::class, 'store'])->name('store');
        Route::get('/{kegiatan}/edit', [KegiatanController::class, 'edit'])->name('edit');
        Route::put('/{kegiatan}', [KegiatanController::class, 'update'])->name('update');
        Route::delete('/{kegiatan}', [KegiatanController::class, 'destroy'])->name('destroy');
    });
});
