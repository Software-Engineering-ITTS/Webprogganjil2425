<?php

use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TokoController;
use Illuminate\Support\Facades\Route;
use App\Models\toko;
use App\Models\transaksi;

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


Route::get('/riwayat', [TransaksiController::class, 'db']);

Route::get('/', function () {
    return view('index',['data'=>toko::all()]);
});
// Route::get('/riwayat', function () {
//     return view('riwayat',['data'=>transaksi::all()]);
// });
Route::get('/create', function (){
    return view('create');
});

Route::resource('toko',TokoController::class);
Route::resource('transaksi',TransaksiController::class);