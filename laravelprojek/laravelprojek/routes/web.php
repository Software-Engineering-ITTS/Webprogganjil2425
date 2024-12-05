<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Models\Mahasiswa;

Route::get('/', function () {
    return view('index', [
        'nama' => "Arasy"
    ]);
});

Route::resource('/mahasiswa', MahasiswaController::class);
Route::get('/', function () {
    $mahasiswa = Mahasiswa::all(); // Ambil semua data mahasiswa
    return view('index', compact('mahasiswa')); // Kirim data ke view
});


