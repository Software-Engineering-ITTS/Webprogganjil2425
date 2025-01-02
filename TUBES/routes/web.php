<?php

use Illuminate\Support\Facades\Route;
use App\Models\laporan;
use App\Http\Controllers\LaporanController;
use App\Models\pengguna;
use App\Http\Controllers\PenggunaController;
use App\Models\pengeluaran;
use App\Http\Controllers\PengeluaranController;
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
    return view('login');
});

Route::get('/lihatdata', function () {
    $laporan = laporan::all(); // Ambil semua data laporan
    $pengeluaran = pengeluaran::all();
    return view('lihatdata', compact('laporan', 'pengeluaran')); // Kirim data ke view
});

Route::get('/pemasukkan', function () {
    return view('pemasukkan');
});

Route::get('/pengeluaran', function () {
    return view('pengeluaran');
});

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/filterdata', [LaporanController::class, 'filter']);
Route::resource('/laporan',LaporanController::class);
Route::resource('/pengeluaran',PengeluaranController::class);
Route::post('/login',[PenggunaController::class,'login']);
