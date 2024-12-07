<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\TransaksiController;
use App\Models\book;
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

Route::get('/riwayat', [TransaksiController::class, 'db']);

Route::get('/', function () {
    return view('index',['book'=>book::all()]);
});

Route::get('/sidebar', function () {
    return view('sidebar');
});

Route::get('/update', function () {
    return view('update');
});

Route::get('/create',[BookController::class, 'store'])->middleware('guest')->name('store');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('destroy');