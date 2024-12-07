<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;


Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/create', [BookController::class, 'create'])->name('books.create');
Route::post('/store', [BookController::class, 'store'])->name('books.store');
Route::get('/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
Route::put('/update/{id}', [BookController::class, 'update'])->name('books.update');
Route::delete('/delete/{id}', [BookController::class, 'destroy'])->name('books.destroy');
Route::post('/books/{id}/buy', [BookController::class, 'buy'])->name('books.buy');



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

Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/', [BookController::class, 'index'])->name('books.index');

