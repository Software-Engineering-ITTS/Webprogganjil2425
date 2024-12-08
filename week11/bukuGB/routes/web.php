<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
    
use App\Http\Controllers\BukusController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bukuses', [BukusController::class, 'index'])->name('bukuses.index');

// Jika Anda membutuhkan route untuk file `pages/index.blade.php`
Route::get('/pages', function () {
    return view('pages.index');
})->name('pages.index');


Route::get('/create', [BukusController::class, 'create'])->name('ListBuku.create'); 
Route::post('/', [BukusController::class, 'store'])->name('ListBuku.store');


// Route untuk halaman edit
Route::get('/list-buku/{buku}/edit', [BukusController::class, 'edit'])->name('ListBuku.edit');

// Route untuk update data
Route::put('/list-buku/{buku}', [BukusController::class, 'update'])->name('ListBuku.update');

Route::delete('/list-buku/{buku}', [BukusController::class, 'destroy'])->name('ListBuku.destroy');


// / Route untuk buku
Route::resource('list-buku', BukusController::class);

// Route untuk transaksi
Route::get('/pembelian', [TransaksiController::class, 'create'])->name('Pembelian.index');
Route::post('/pembelian', [TransaksiController::class, 'store'])->name('pembelian.store');
Route::get('/riwayat', [TransaksiController::class, 'index'])->name('Riwayat.index');

// Route::get('/bukuses', [BukusController::class, 'index'])->name('ListBuku.index');
// Route::get('/bukuses/create', [BukusController::class, 'create'])->name('ListBuku.create');
// Route::post('/bukuses', [BukusController::class, 'store'])->name('ListBuku.store');


