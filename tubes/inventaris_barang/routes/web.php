<?php

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

Route::get('/', [AuthController::class, 'toLoginPage'])->name('login');
Route::post('/', [AuthController::class, 'doLogin'])->name('do-login');

Route::get('/home', function () {
    return view('home.home');
})->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
