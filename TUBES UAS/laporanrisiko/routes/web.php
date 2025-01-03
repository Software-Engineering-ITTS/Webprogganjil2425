<?php

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

Route::get('/', function () {
    return view('login');
});


// routes/web.php

use App\Http\Controllers\AuthController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\RisikoController;

Route::get('/laporan-risiko', [RisikoController::class, 'showForm'])->name('risiko.form')->middleware('auth');
Route::post('/laporan-risiko', [RisikoController::class, 'submitForm'])->name('risiko.submit')->middleware('auth');
Route::get('/strategi-penanggulangan', [RisikoController::class, 'showStrategiForm'])->name('strategi.form');
Route::post('/strategi-penanggulangan', [RisikoController::class, 'submitStrategiForm'])->name('submitStrat');
