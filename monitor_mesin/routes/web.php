<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\KondisiMesinsController;
use App\Http\Controllers\MesinsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('/auth/login');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::resource('/category', CategoryController::class);
Route::resource('/mesin', MesinsController::class);
Route::resource('/kondisi_mesin', KondisiMesinsController::class);
Route::resource('/history', HistoryController::class);
Route::resource('/daftar_user', UserController::class);
