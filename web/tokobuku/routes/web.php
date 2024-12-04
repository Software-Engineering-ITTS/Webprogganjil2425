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
