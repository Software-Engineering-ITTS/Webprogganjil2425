<?php

use App\Http\Controllers\MahasiswaController;
use App\Models\mahasiswa;
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

// Route::get('/', function () {
//     return view('index', [
//         'nama' => "Siti Nafiatul Fauziah",
//         'kota' => "Surabaya"
//     ]);
// });

Route::get('/', [MahasiswaController::class, 'index']);

Route::resource('/mahasiswa', MahasiswaController::class);