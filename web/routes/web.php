<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KesehatanController;
use App\Models\pegawai;
use App\Models\kesehatan;


Route::get('/', function () {
    return view('login',['data'=>Kesehatan::all()]);
});

Route::get('/tambah', function () {
    return view('tambah');
});

Route::get('/riwayat/{id}', function ($id) {
    $data = pegawai::where('id', $id)->get();
    return view('riwayat', ['data' => $data]);
})->name('riwayat');
    
Route::get('/kesehatan/{id}', function ($id) {
    $data = kesehatan::where('id_pegawai', $id)->get();
    return view('kesehatan', ['data' => $data]);
})->name('kesehatan');

Route::post('/login', [PegawaiController::class, 'login']);
Route::resource('pegawai',PegawaiController::class);
Route::resource('kesehatan',KesehatanController::class);
