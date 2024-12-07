<?php

use App\Http\Controllers\TokoController;
use App\Http\Controllers\TransaksiController;
use App\Models\toko;
use App\Models\transaksi;
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
    return view('index',['data'=>toko::all()]);
});
Route::get('/app', function () {
    return view('app');
});

Route::get('/create', function (){
    return view('create');
});

Route::get('/detail', function () {
    return view('detail', ['data'=>transaksi::all()]);
});


Route::resource('toko',TokoController::class);
Route::resource('transaksi',TransaksiController::class);