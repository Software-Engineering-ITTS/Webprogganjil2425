<?php

use App\Http\Controllers\AsetController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PemeliharaanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Aset;
use App\Models\Lokasi;
use App\Models\Pemeliharaan;
use PgSql\Lob;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/app', function () {
    return view('app', ['data'=>Aset::all()]);
});

Route::get('/asettambah', function () {
    return view('asettambah');
});


Route::get('/lihatlokasi', function () {
    return view('lihatlokasi', [
        'lokasi' => Lokasi::with('aset')->get(),
        'aset' => Aset::all()
    ]);
});

Route::get('/viewpemeliharaan', [PemeliharaanController::class, 'viewPemeliharaan'])->name('viewpemeliharaan');

Route::post('/lokasi/store', [LokasiController::class, 'store'])->name('lokasi');

Route::get('/lihatlokasi', [LokasiController::class, 'view'])->name('lihatlokasi');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/lokasi', function () {
    return view('lokasi', ['data'=>Aset::all()]);
});

Route::get('/pemeliharaan', function () {
    return view('pemeliharaan');
});

Route::get('/tes', function () {
    return view('pemeliharaan', [
        'lokasi' => Lokasi::with('aset')->get(),
        'aset' => Aset::all()
    ]);
});

Route::post('/pemeliharaan/{id}/update-status', [PemeliharaanController::class, 'updateStatus'])->name('pemeliharaan.updateStatus');

Route::resource('aset',AsetController::class);
Route::resource('lokasi',LokasiController::class);
Route::resource('pemeliharaan', PemeliharaanController::class);