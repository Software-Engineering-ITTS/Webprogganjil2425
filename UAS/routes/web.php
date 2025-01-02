<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Models\pengguna;
use App\Http\Controllers\EventController;
use App\Models\event;
use App\Http\Controllers\KehadiranController;
use App\Models\kehadiran;

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/tambahevent', function () {
    return view('event');
});

Route::get('/menuadmin',function(){
    return view('menuadmin');
});

Route::get('/menuuser',function(){
    return view('menuuser');
});

Route::get('/riwayat', [KehadiranController::class, 'index']);
Route::post('/login', [PenggunaController::class, 'login']);
Route::resource('pengguna',PenggunaController::class);
Route::resource('event',EventController::class);
Route::resource('kehadiran',KehadiranController::class);
