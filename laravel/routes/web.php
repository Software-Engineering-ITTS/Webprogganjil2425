<?php

use App\Http\Controllers\StokbukuController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('index'); 
})->name('home');

// Route to display the form for adding a book
Route::get('/tambahbuku', function () {
    return view('tambahbuku');
});


Route::get('/lihatbuku', [StokbukuController::class, 'index'])->name('lihatbuku');


Route::resource('/buku', StokbukuController::class);

Route::delete('/buku/{id}', [StokbukuController::class, 'destroy'])->name('buku.destroy');


Route::get('/buku/{id}/edit', [StokbukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [StokbukuController::class, 'update'])->name('buku.update');