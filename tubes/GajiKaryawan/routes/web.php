<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\GajiController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('dashboard');
});

// Route Karyawan
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::get('/karyawan/{karyawan}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/{karyawan}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::delete('/karyawan/{karyawan}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

// Route Presensi
Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi.index');
Route::post('/presensi', [PresensiController::class, 'store'])->name('presensi.store');
Route::get('/presensi/{presensi}/edit', [PresensiController::class, 'edit'])->name('presensi.edit');
Route::put('/presensi/{presensi}', [PresensiController::class, 'update'])->name('presensi.update');
Route::delete('/presensi/{presensi}', [PresensiController::class, 'destroy'])->name('presensi.destroy');

//Route Gaji
Route::get('/gaji', [GajiController::class, 'index'])->name('gaji.index');
Route::get('/gaji', [GajiController::class, 'create'])->name('gaji.create');
Route::post('/gaji', [GajiController::class, 'store'])->name('gaji.store');
