<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::get('/book', function () {
    return view('book');
});

Route::post('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove-from-cart', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('cart', [CartController::class, 'viewCart'])->name('cart.view');
