<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index']);
Route::post('/book-create', [BookController::class, 'store']);

Route::get('/detail', function () {
    return view('detail-buku');
});
