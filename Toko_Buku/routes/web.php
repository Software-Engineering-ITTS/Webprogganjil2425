<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
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

Route::get('/lina', function () {
    return view('welcome');
});

Route::get('/', [BukuController::class, 'index']);

Route::post('/store/{id}', [BukuController::class, 'store'] );
Route::get('/sukses', fn() => view('sukses'));

Route::get('/admin/login', [AdminController::class, 'loginForm']);
Route::post('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::post('/admin/addbook', [AdminController::class, 'books']);
Route::post('/admin/logout', [AdminController::class, 'logout']);

