// routes/web.php
<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\FakultasController;

Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('fakultas', FakultasController::class);

Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');