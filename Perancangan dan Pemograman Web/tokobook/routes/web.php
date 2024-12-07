<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{book}', [CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/update/{book}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{book}', [CartController::class, 'remove'])->name('cart.remove');
    
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders/create', [OrderController::class, 'store'])->name('orders.store');
});
