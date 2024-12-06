<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\Home;
use App\Http\Controllers\TransactionController;
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
// Resources
Route::resource('/Book', BookController::class);
Route::resource('/Transaction', TransactionController::class);


Route::get('/TambahBuku', [BookController::class, 'index'])->name('Buku');

Route::get('/TambahTransaksi', [TransactionController::class, 'index'])->name('Transaction');
Route::get('/ViewTransaksi', [TransactionController::class, 'show'])->name('ViewTransaction');

Route::get('/ViewBuku', [BookController::class, 'show'])->name('ViewBuku');
// Route::get('/', [BookController::class, 'show'])->name('Buku');
Route::get('/Home', [Home::class, 'index'])->name('home');
Route::get('/Home', [Home::class, 'show'])->name('home');
Route::get('/', function () {
    return view('layout/app');
});
