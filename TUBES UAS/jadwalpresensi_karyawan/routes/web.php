<?php

use App\Http\Controllers\JadwalKerjaController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PindahShiftController;
use App\Http\Controllers\PresensiController;
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

Route::get('/', [LoginController::class, 'showLogin']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/admin', function () {
    if (!session()->has('admin_id')) {
        return redirect('/')->with('error', 'You must be logged in to access this page.');
    }
    return view('admin');
});

Route::get('/karyawan', function () {
    if (!session()->has('karyawan_id')) {
        return redirect('/')->with('error', 'You must be logged in to access this page.');
    }
    return view('karyawan');
});

// admin kelola karyawan
Route::get('/admin/daftarkaryawan', [KaryawanController::class, 'show']);
Route::get('/admin/tambahkaryawan', [KaryawanController::class, 'create']);
Route::post('/admin/tambahkaryawan', [KaryawanController::class, 'store']);
Route::get('/admin/editkaryawan/{karyawan}', [KaryawanController::class, 'edit']);
Route::put('/admin/editkaryawan/{karyawan}', [KaryawanController::class, 'update']);
Route::delete('/admin/hapuskaryawan/{karyawan}', [KaryawanController::class, 'destroy']);

// admin kelola jadwal kerja
Route::get('/admin/jadwalkaryawan', [KaryawanController::class, 'showforjadwal']);
Route::get('/admin/detailjadwal/{karyawan}', [JadwalKerjaController::class, 'show']);
Route::get('/admin/tambahjadwal/{karyawan}', [JadwalKerjaController::class, 'create']);
Route::post('/admin/tambahjadwal', [JadwalKerjaController::class, 'store']);
Route::get('/admin/editjadwal/{id_jadwal}', [JadwalKerjaController::class, 'edit']);
Route::put('/admin/editjadwal/{id_jadwal}', [JadwalKerjaController::class, 'update']);
Route::delete('/admin/hapusjadwal/{id_jadwal}', [JadwalKerjaController::class, 'destroy']);

// karyawan jadwal kerja
Route::get('/karyawan/lihatjadwal', [JadwalKerjaController::class, 'showkar']);
Route::get('/karyawan/carijadwal', [JadwalKerjaController::class, 'showkar'])->name('carijadwal');

// karyawan pindah shift
Route::get('/karyawan/pindahshift/{id_jadwal}', [PindahShiftController::class, 'pindah']);
Route::post('/karyawan/pindahshift', [PindahShiftController::class, 'prosespindah']);
Route::get('/karyawan/riwayatpindah', [PindahShiftController::class, 'riwayat']);
Route::delete('/karyawan/pindahshift/{id_shift}', [PindahShiftController::class, 'destroy']);

// karyawan presensi
Route::get('/karyawan/presensi/{id_jadwal}', [PresensiController::class, 'presensi']);
Route::post('/karyawan/presensi', [PresensiController::class, 'prosespresensi']);
Route::get('/karyawan/riwayatpresensi', [PresensiController::class, 'riwayat']);
Route::post('/karyawan/konfirmkeluar/{id_presensi}', [PresensiController::class, 'konfirmkeluar']);

// admin kelola pindah shift
Route::get('/admin/reviewpengajuan', [PindahShiftController::class, 'review']);
Route::get('/admin/confirmsetujui/{id}', [PindahShiftController::class, 'confirmsetujui']);
Route::get('/admin/confirmtolak/{id}', [PindahShiftController::class, 'confirmtolak']);

// admin kelola presensi
Route::get('/admin/reviewpresensi', [PresensiController::class, 'review']);
Route::get('/admin/reportpresensi', [PresensiController::class, 'reportpresensi'])->name('reportpresensi');
Route::get('/admin/reportperkaryawan', [PresensiController::class, 'reportperkaryawan'])->name('reportperkaryawan');