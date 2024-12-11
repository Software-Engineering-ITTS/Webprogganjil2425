<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrdersDetailsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('index');
});

Route::get('admin/', [AdminController::class, 'redirectToLogin']);
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login']);
Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Dashboard hanya untuk admin yang login
Route::prefix('admin')->middleware(['admin.auth'])->group(function () {
    //dashboard
    // Route::get('admin/dashboard', function () {
    //     return view('admin.dashboard');
    Route::resource('dashboard', AdminController::class);
    Route::resource('book', BooksController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('orders', OrdersController::class);
    Route::resource('orders_detail', OrdersDetailsController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
