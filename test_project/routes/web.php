<?php

use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;
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

Route::get('/', [MahasiswaController::class, 'index']);
Route::delete('/', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::resource('/Mahasiswa', MahasiswaController::class);


// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/alldata', function () {
//     return view('alldata');
// });


// Route::get('/', [MahasiswaController::class,'index'] );
// Route::post('/Mahasiswa', [MahasiswaController::class,'store'] );
// Route::get('/index', function () {
//     return view('alldata');
// });
