<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/tampilkan', function () {
    return view('show');
});

Route::get('/tambah', function () {
    return view('add');
});

Route::get('/edit', function () {
    return view('edit');
});
