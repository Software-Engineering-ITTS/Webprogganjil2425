<?php

use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TokoController;
use Illuminate\Support\Facades\Route;
use App\Models\transaksi;
use App\Models\toko;
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
    return view('index',['data'=>toko::all()]);
});
Route::get('/hasil', function () {
    return view('hasil',['data'=>transaksi::all()]);
});
Route::get('/create', function (){
    return view('create');
});

Route::resource('toko',TokoController::class);
Route::resource('transaksi',TransaksiController::class);