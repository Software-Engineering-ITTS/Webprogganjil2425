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
Route::get('/create-book', [BookController::class, 'create'])->name('books.create');

// USER ROUTES
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// TRANSACTION ROUTES
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');