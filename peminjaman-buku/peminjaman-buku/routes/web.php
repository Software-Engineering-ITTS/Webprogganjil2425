<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

// Menampilkan daftar buku di halaman utama
Route::get('/', [BookController::class, 'index'])->name('books.index');

// Route untuk CRUD buku
Route::resource('books', BookController::class)->except(['show']);
// Route tambahan jika Anda membutuhkan halaman khusus untuk buku
Route::get('books/create', [BookController::class, 'create'])->name('books.create');

Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');

Route::resource('books', BookController::class);

// Routes untuk menampilkan form edit
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');

// Routes untuk mengupdate data buku
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');

