<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookssController;
use App\Http\Controllers\PembelianController;

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
    return view('index');
});



//route bookss
Route::get('/', [BookssController::class, 'index']);
Route::post('/bookss', [BookssController::class, 'store'])->name('bookss.store');
Route::get('/bookss/{bookss}/edit', [BookssController::class, 'edit'])->name('bookss.edit');
Route::put('/bookss/{bookss}', [BookssController::class, 'update'])->name('bookss.update');
Route::delete('/bookss/{bookss}', [BookssController::class, 'destroy'])->name('bookss.destroy');

//route pembelian
Route::get('/pembelian', [PembelianController::class, 'index'])->name('bookss.index');
Route::get('/pembelian/{id}', [PembelianController::class, 'pembelian'])->name('bookss.pembelian');
Route::post('/pembelian/{id}', [PembelianController::class, 'beli'])->name('bookss.beli');
