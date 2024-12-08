<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

Route::resource('buku', BukuController::class);
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
    return view('Barang/app');
});

Route::get('/Barang',[BukuController::class, 'app'])->name('Barang.app');

// Route::get('/', [BukuController::class, 'buku']);
// Route::delete('/', [BukuController::class, 'destroy'])->name('buku.destroy');
// Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
// Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
// Route::resource('/buku', BukuController::class);
// Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
