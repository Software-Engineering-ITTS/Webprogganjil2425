<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/barang', [BukuController::class, 'index'])->name('barang.index');
Route::get('/barang/add', [BukuController::class, 'create'])->name('barang.create');
Route::post('/barang/add', [BukuController::class, 'store'])->name('barang.store');
Route::get('/barang/{id}', [BukuController::class, 'edit'])->name('barang.edit');
Route::post('/barang/{id}', [BukuController::class, 'update'])->name('barang.update');
Route::delete('/barang/{id}', [BukuController::class, 'destroy'])->name('barang.destroy');
