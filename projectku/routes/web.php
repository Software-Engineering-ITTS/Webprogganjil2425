<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Models\Mahasiswa;

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
        'nama' => "Muhammad Khafidh Ainur Rasyidh",
        'kota' => "surabaya"
    ]);
});

Route::resource('/mahasiswa', MahasiswaController::class);
Route::get('/', function () {
    $mahasiswa = mahasiswa::all(); // Ambil semua data mahasiswa
    return view('index', compact('mahasiswa')); // Kirim data ke view
});

// Route::get('/index', function () {
//     return view('index');
// });
