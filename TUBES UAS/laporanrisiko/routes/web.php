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
    return view('login');
});


use App\Http\Controllers\RisikoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Rute auth
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/laporan-risiko', [RisikoController::class, 'showForm'])->name('risiko.form')->middleware('auth');
Route::post('/laporan-risiko', [RisikoController::class, 'submitForm'])->name('risiko.submit')->middleware('auth');
Route::get('/penanggulangan', [RisikoController::class, 'showPenanggulanganForm'])->name('penanggulangan.form');
Route::post('/penanggulangan', [RisikoController::class, 'submitPenanggulanganForm'])->name('risiko.submitPenanggulangan');

// Rute admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');

// Rute laporan
Route::get('/admin/viewlaporan', [RisikoController::class, 'viewLaporan'])->name('admin.viewlaporan')->middleware('auth');

// Rute penanggulangan
Route::get('/admin/viewpenanggulangan', [RisikoController::class, 'viewPenanggulangan'])->name('admin.viewpenanggulangan')->middleware('auth');
Route::get('/admin/beri-penanggulangan/{id}', [RisikoController::class, 'beriPenanggulangan'])->name('admin.beriPenanggulangan')->middleware('auth');



