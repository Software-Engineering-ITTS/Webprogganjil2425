<?php

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
    return view('app');
});

Route::get('/buku', function () {
    return view('buku');
});

Route::get('/keranjang', function () {
    return view('keranjang');
});


use App\Http\Controllers\keranjangController;

Route::get('/keranjang', [keranjangController::class, 'index'])->name('keranjang.index');
Route::post('/keranjang', [keranjangController::class, 'store'])->name('keranjang.store');
Route::patch('/keranjang/{index}', [keranjangController::class, 'update'])->name('keranjang.update');
Route::delete('/keranjang/{index}', [keranjangController::class, 'destroy'])->name('keranjang.destroy');


use App\Http\Controllers\BukuController;

Route::resource('buku', BukuController::class);
Route::get('/tambahbuku', BukuController::class, 'index')->name('buku.create');
