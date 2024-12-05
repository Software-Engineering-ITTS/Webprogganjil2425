<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\PembelianController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rute Buku (Manage Buku)
Route::prefix('bukus')->name('bukus.')->group(function () {
    Route::get('/', [BukuController::class, 'index'])->name('index'); 
    Route::get('/create', [BukuController::class, 'create'])->name('create'); 
    Route::post('/', [BukuController::class, 'store'])->name('store'); 
    Route::get('/{buku}/edit', [BukuController::class, 'edit'])->name('edit'); 
    Route::put('/{buku}', [BukuController::class, 'update'])->name('update'); 
    Route::delete('/{buku}', [BukuController::class, 'destroy'])->name('destroy'); 
});

// Rute Pembelian Buku
Route::prefix('pembelian')->name('pembelian.')->group(function () {
    Route::get('/', [PembelianController::class, 'index'])->name('index'); 
    Route::get('/create', [PembelianController::class, 'create'])->name('create'); 
    Route::post('/', [PembelianController::class, 'store'])->name('store'); 
});



