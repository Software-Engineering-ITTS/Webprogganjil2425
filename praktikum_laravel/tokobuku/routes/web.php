<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
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



// BOOKS ROUTES
Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/create-book', [BookController::class, 'create'])->name('books.create');
Route::post('/store-book', [BookController::class, 'store'])->name('books.store');
Route::get('/edit-book/{id}', [BookController::class, 'edit'])->name('book.edit');
Route::post('/update-book', [BookController::class, 'update'])->name('books.update');
Route::delete('/delete-book/{id}', [BookController::class, 'destroy'])->name('book.destroy');


// USER ROUTES
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/create-users', [UserController::class, 'create'])->name('users.create');
Route::post('/store-users', [UserController::class, 'store'])->name('users.store');
Route::get('/edit-users/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/update-users', [UserController::class, 'update'])->name('users.update');

// TRANSACTION ROUTES
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');