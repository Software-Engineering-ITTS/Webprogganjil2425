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

// Route::get('/', function () {
//     return view('books.index');
// });

// BOOKS ROUTES
Route::get('/', [BookController::class, 'index'])->name('books.index');
// ke halaman form untuk create
Route::get('/create-book', [BookController::class, 'create'])->name('books.create');
// post untuk ngirim datanya wak
Route::post('/store-book', [BookController::class, 'store'])->name('books.store');

// ke halaman form untuk update
Route::get('/edit-book/{$id}', [BookController::class, 'edit'])->name('book.edit');
// untuk update data wak
Route::post('/update-book', [BookController::class, 'update'])->name('books.update');

// untuk delete
Route::delete('/delete-book/{id}', [BookController::class, 'destroy'])->name('book.destroy');


// USER ROUTES
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/create-users', [UserController::class, 'create'])->name('users.create');
Route::post('/store-users', [UserController::class, 'store'])->name('users.store');

// TRANSACTION ROUTES
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');