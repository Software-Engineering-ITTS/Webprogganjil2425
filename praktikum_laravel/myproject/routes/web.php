<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index', [
        'nama' => "Muhammad Asthi Seta Ari Yuwana",
        'kota' => "Surabaya"
    ]);
});


// Route::get('/index', function () {
//     return view('index');
// });