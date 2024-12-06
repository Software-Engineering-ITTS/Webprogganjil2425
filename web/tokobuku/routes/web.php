<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', function () {
    return view('index');
});


Route::get('/add', function () {
    return view('add');
});

Route::post('/add', [BukuController::class, 'store']);

Route::get('/edit', function () {
    return view('edit');
});

Route::get('/show', [BukuController::class, 'index']);
Route::get('/edit/{id}', [BukuController::class, 'edit'])->name('books.edit');
Route::put('/edit/{id}', [BukuController::class, 'update'])->name('books.update');
Route::delete('/delete/{id}', [BukuController::class, 'destroy'])->name('books.destroy');