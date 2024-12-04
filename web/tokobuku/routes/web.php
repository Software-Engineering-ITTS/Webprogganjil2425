<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/tampilkan', function () {
    return view('tampilkan');
});

Route::get('/tambah', function () {
    return view('tambah');
});

Route::get('/edit', function () {
    return view('edit');
});
