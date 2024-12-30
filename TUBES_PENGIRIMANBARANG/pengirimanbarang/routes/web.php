<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\StatusBarangController;
use App\Http\Controllers\AdminController;
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
    return view('auth/login');
});

//Route ngge dashboard admin
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

//Route ngge login & register
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'registerPost'])->name('register.post');
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginPost'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route ngge formbarang
Route::get('/dashboard/formbarang', [BarangController::class, 'index'])->name('formbarang');
Route::post('/dashboard/formbarang', [BarangController::class, 'store'])->name('formbarang.store');
Route::get('/dashboard/formbarang/{id}/edit', [BarangController::class, 'edit'])->name('formbarang.edit');
Route::post('/dashboard/formbarang/{id}/edit', [BarangController::class, 'update'])->name('formbarang.update');
Route::delete('/dashboard/formbarang/{id}', [BarangController::class, 'destroy'])->name('formbarang.destroy');
// Route ngge pengiriman
Route::resource('pengiriman', PengirimanController::class);
Route::get('/dashboard', [PengirimanController::class, 'index'])->name('dashboard');
Route::get('/dashboard/pengiriman', [PengirimanController::class, 'create'])->name('pengiriman.create');
Route::post('/dashboard/pengiriman', [PengirimanController::class, 'store'])->name('pengiriman.store');
// Route ngge statusbarang
Route::get('/dashboard/statusbarang', [StatusBarangController::class, 'create'])->name('statusbarang.create');
Route::post('/dashboard/statusbarang', [StatusBarangController::class, 'store'])->name('statusbarang.store');
Route::get('/dashboard/status', [StatusBarangController::class, 'index'])->name('statusbarang');