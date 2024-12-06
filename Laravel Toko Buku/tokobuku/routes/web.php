<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransaksiController;
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

Route::get('/', [LoginController::class, 'showLogin']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/admin', function () {
    if (!session()->has('admin_id')) {
        return redirect('/')->with('error', 'You must be logged in to access this page.');
    }
    return view('admin');
});

Route::get('/customer', function () {
    if (!session()->has('customer_id')) {
        return redirect('/')->with('error', 'You must be logged in to access this page.');
    }
    return view('customer');
});

Route::get('/admin/daftarbuku', [BukuController::class, 'show']);
Route::get('/admin/tambahbuku', [BukuController::class, 'create']);
Route::post('/admin/tambahbuku', [BukuController::class, 'store']);
Route::get('/admin/editbuku/{buku}', [BukuController::class, 'edit']);
Route::put('/admin/editbuku/{buku}', [BukuController::class, 'update']);
Route::delete('/admin/hapusbuku/{buku}', [BukuController::class, 'destroy']);

Route::get('/admin/historis', [TransaksiController::class, 'showhistoris']);

Route::get('/customer/belibuku', [BukuController::class, 'showbeli']);
Route::get('/customer/konfirmbeli/{buku}', [BukuController::class, 'konfirmbeli']);

Route::get('/customer/keranjang', [KeranjangController::class, 'showkeranjang']);
Route::post('/customer/keranjang', [KeranjangController::class, 'addtocart']);
Route::delete('/customer/hapuskeranjang/{index}', [KeranjangController::class, 'hapuskeranjang']);

Route::get('/customer/checkout', [TransaksiController::class, 'checkout']);

Route::get('/customer/histori', [TransaksiController::class, 'showhistori']);