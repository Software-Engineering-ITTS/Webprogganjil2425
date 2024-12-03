<?php

use App\Http\Controllers\MahasiswaController;
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
        'nama' => "Dita Ramadhani Tianto",
        'kota' => "Surabaya"
    ]);
});

Route::resource('/Mahasiswa', MahasiswaController::class);

// Route::get('/index', function () {
//     return view('index');
// });

