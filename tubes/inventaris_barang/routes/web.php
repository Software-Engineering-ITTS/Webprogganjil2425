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

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home.home');
    })->name('home');

    // TODO ADD PROTECTED ROUTES HERE

    // Route::resource('karyawan', UserController::class)->middleware('admin');
    // Route::resource('stock', StockController::class)->middleware('admin');
    // Route::resource('transactions', TransactionController::class);
    // Route::resource('products', ProductController::class);
    // Route::resource('sales', SalesController::class);
});


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
