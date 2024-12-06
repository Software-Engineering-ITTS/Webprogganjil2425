<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetailTransaksiController;

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

// Route::get('/', function () {
//     return view('index');
// });


Route::resource('bukus', BukuController::class);

Route::get('/', [BukuController::class, 'index']);
Route::post('/Buku', [BukuController::class, 'store']);
Route::get('/Buku/{id}/edit', [BukuController::class, 'edit'])->name('Buku.edit');
Route::put('/Buku/{id}', [BukuController::class, 'update'])->name('Buku.update');
Route::delete('/Buku/{id}', [BukuController::class, 'destroy'])->name('Buku.destroy');


Route::resource('kategoris', KategoriController::class);

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');


Route::resource('transaksis', TransaksiController::class);

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

Route::resource('detailTransaksis', DetailTransaksiController::class);

Route::get('/detailTransaksi', [DetailTransaksiController::class, 'index'])->name('detailTransaksi.index');
Route::get('/detailTransaksi/create', [DetailTransaksiController::class, 'create'])->name('detailTransaksi.create');
Route::post('/detailTransaksi', [DetailTransaksiController::class, 'store'])->name('detailTransaksi.store');
Route::get('/detailTransaksi/{id}/edit', [DetailTransaksiController::class, 'edit'])->name('detailTransaksi.edit');
Route::put('/detailTransaksi/{id}', [DetailTransaksiController::class, 'update'])->name('detailTransaksi.update');
Route::delete('/detailTransaksi/{id}', [DetailTransaksiController::class, 'destroy'])->name('detailTransaksi.destroy');
