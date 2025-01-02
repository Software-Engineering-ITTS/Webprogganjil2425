<?php

use Illuminate\Support\Facades\Route;
use App\Models\barang;
use App\Http\Controllers\BarangController;

Route::get('/tambahbarang', function () {
    return view('tambahbarang');
});
Route::get('/', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home',['data'=>Barang::all()]);
});
Route::resource('barang', BarangController::class);
Route::post('/barang/{Barang}/beli', [BarangController::class, 'beli'])->name('barang.beli');
Route::get('/barang/{Barang}/editing', [BarangController::class, 'editing'])->name('barang.editing');
Route::post('/barang/{Barang}/tambah', [BarangController::class, 'tambah'])->name('barang.tambah');
Route::post('/login', [BarangController::class, 'login']);