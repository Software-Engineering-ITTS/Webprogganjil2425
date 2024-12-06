<?php

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\View;

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
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
});

Route::get('/kategori', function () {
    return view('components.kategori');
});

Route::get('/databuku', function () {
    return view('components.databuku');
});

Route::get('/transaksi', function () {
    return view('components.transaksi');
});

Route::get('/databuku', [BukuController::class, 'index'])->middleware('guest')->name('index');
Route::get('/tambahbuku',[BukuController::class, 'store'])->middleware('guest')->name('store');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/home', [HomeController::class, 'index'])->middleware('guest')->name('home');

    Route::get('/signup', [AuthController::class, 'signup'])->middleware('guest')->name('signup');
    Route::post('/signup', [AuthController::class, 'signupPost'])->middleware('guest');

    Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->middleware('guest');
});

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
