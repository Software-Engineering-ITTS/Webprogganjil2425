<?php

use App\Http\Controllers\DashboardadminController;
use App\Http\Controllers\DashboardpenggunaController;
use App\Http\Controllers\FormkonsultasiController;
use App\Http\Controllers\FormregistrasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ViewdataController;
use App\Http\Controllers\ViewregistrasiController;
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

Route::GET('/', [LoginController::class, 'showlogin'])->name('login');
Route::POST('/login', [LoginController::class, 'login']);
Route::GET('/dashboardadmin', [DashboardadminController::class, 'showdashboardadmin'])-> name('dashboardadmin');
Route::GET('/dashboardpengguna', [DashboardpenggunaController::class, 'showdashboardpengguna'])-> name('dashboardpengguna');
//Route::GET('/dashboardpengguna', [DashboardpenggunaController::class, 'showdashboardpengguna'])->name('dashboardpengguna');

//Route::GET('/viewdata', [PasienController::class, 'pasien'])->name('viewdata');
Route::GET('/viewdata', [ViewdataController::class, 'viewdataform'])->name('viewdata');

Route::POST('/viewdata', [ViewdataController::class, 'store'])->name('viewdata');
Route::GET('/viewregistrasi', [ViewregistrasiController::class, 'viewregistrasi'])->name('viewregistrasi');
Route::POST('/viewregistrasi', [ViewregistrasiController::class, 'store'])->name('viewregistrasi');
Route::GET('/formregistrasi', [FormregistrasiController::class, 'formregis'])->name('formregistrasi');
Route::POST('/formregistrasi', [FormregistrasiController::class, 'regis'])->name('formregistrasi');

//opsional
//Route::POST('/formkonsultasi', [PasienController::class, 'pasien'])->name('formkonsultasi');
//Route::POST('/viewdata', [PasienController::class, 'pasien'])->name('viewdata');


//Route::POST('/formkonsultasi', [ViewdataController::class, 'store'])->name('viewdata');
Route::GET('/formkonsultasi', [FormkonsultasiController::class, 'formkonsul'])->name('formkonsultasi');
Route::POST('/formkonsultasi', [FormkonsultasiController::class, 'konsul'])->name('formkonsultasi');

//Route::match(['GET', 'POST'], '/schedule', [ScheduleController::class, 'scheduledoctor'])->name('schedule');
Route::GET('/schedule', [ScheduleController::class, 'show'])->name('schedule');
Route::POST('/schedule', [ScheduleController::class, 'scheduledoctor'])->name('schedule');
Route::put('/schedule/{id}', [ScheduleController::class, 'update'])->name('schedule.update');
Route::delete('/schedule/{id}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');
