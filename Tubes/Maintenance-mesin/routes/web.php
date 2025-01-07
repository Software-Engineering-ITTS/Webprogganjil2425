<?php

use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route untuk halaman utama
Route::get('/', function () {
    return view('index');
});

// Rute untuk mesin
Route::get('/mesin', [MesinController::class, 'tampil'])->name('mesin.tampil');
Route::get('/mesin/tambah', [MesinController::class, 'tambah'])->name('mesin.tambah');
Route::post('/mesin/submit', [MesinController::class, 'submit'])->name('mesin.submit');
Route::get('/mesin/edit/{id}', [MesinController::class, 'edit'])->name('mesin.edit');
Route::post('/mesin/update/{id}', [MesinController::class, 'update'])->name('mesin.update');
Route::post('/mesin/delete/{id}', [MesinController::class, 'delete'])->name('mesin.delete');

// Rute untuk sesi login
Route::get('/sesi', [SessionController::class, 'indeks']);
Route::post('/sesi/login', [SessionController::class, 'login']);

// Rute logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('sesi')->with('success', 'Anda berhasil logout.');
})->name('logout');

// Rute untuk maintenance mesin
Route::get('/mesin/maintenance', [MaintenanceController::class, 'index'])->name('maintenance.index');
Route::post('/mesin/maintenance/save', [MaintenanceController::class, 'store']);
Route::post('/mesin/maintenance/jadwal', [MaintenanceController::class, 'jadwal']);

// Menampilkan jadwal berdasarkan mesin
Route::get('/mesin/maintenance/getJadwalByMesin', [MaintenanceController::class, 'getJadwalByMesin']);

// Rute untuk jadwal
Route::resource('jadwal', JadwalController::class);

// Rute untuk edit dan update jadwal
Route::get('jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
Route::put('jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');


// Menampilkan form untuk mengedit maintenance
Route::get('/mesin/maintenance/{id}/edit', [MaintenanceController::class, 'editmaintenance'])->name('editmaintenance');

// Menghapus data maintenance
Route::delete('/mesin/maintenance/{id}', [MaintenanceController::class, 'destroy'])->name('maintenance.delete');

// Route untuk update status maintenance
Route::put('/maintenance/{id}/update-status', [MaintenanceController::class, 'updateStatus'])->name('maintenance.updateStatus');

// Route untuk update teknisi maintenance
Route::put('/maintenance/{id}/update-teknisi', [MaintenanceController::class, 'updateTeknisi'])->name('maintenance.updateTeknisi');

// Route untuk update deskripsi perawatan
Route::put('/maintenance/{id}/update-deskripsi', [MaintenanceController::class, 'updateDeskripsi'])->name('maintenance.updateDeskripsi');


// Route::resource('jadwal', JadwalController::class);
Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');



// Menampilkan form edit untuk jadwal tertentu
// Route::get('jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');

// // Mengupdate data jadwal
// Route::put('jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');

// Route::get('jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');

