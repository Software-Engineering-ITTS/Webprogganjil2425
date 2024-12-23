<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/home', function () {
    return view('home');
});

// Route::get('/dashboard/data-kegiatan-form', function() {
//     return view('admin.tambahkegiatan');
// });

Route::middleware('auth')->group(function() {

    Route::view('/dashboard', [AdminController::class, 'layouts.sidebar'])->name('dashboard');

    Route::get('/dashboard/data-anggota', [AdminController::class, 'dataanggota']);
    Route::get('/dashboard/data-anggota', [AdminController::class, 'showDataAnggota']);

    Route::get('/dashboard/data-kegiatan', [AdminController::class, 'datakegiatan']);
    Route::get('/dashboard/data-kegiatan-form', [AdminController::class, 'store'])->name('store');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'guest'], function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name("login.post");

    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'registerPost'])->name("register.post");
});