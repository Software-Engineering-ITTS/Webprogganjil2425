<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransaksiController;



Route::get('/', function () {
    return view('create');
});

Route::get('/', [TransaksiController::class, 'create'])->name('transaksi.create');


Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books', [BookController::class, 'index'])->name('books.index');

Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit'); // Form Edit
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update'); // Proses Update

Route::delete('/book/{id}',[BookController::class, 'destroy'])->name('books.destroy');


Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
