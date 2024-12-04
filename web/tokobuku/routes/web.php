<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/show', function () {
    return view('show');
});

Route::get('/add', function () {
    return view('add');
});

Route::get('/edit', function () {
    return view('edit');
});
