<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangCategoryController;
use App\Http\Controllers\TransaksiController;

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

    // KARYWAN ROUTES
    Route::get('/karyawan', [UserController::class, 'index'])->middleware('admin')->name('karyawan.index');
    Route::get('/create-karyawan', [UserController::class, 'create'])->middleware('admin')->name('karyawan.create');
    Route::post('/store-karyawan', [UserController::class, 'store'])->middleware('admin')->name('karyawan.store');
    Route::get('/edit-karyawan/{id}', [UserController::class, 'edit'])->middleware('admin')->name('karyawan.edit');
    Route::put('/update-karyawan', [UserController::class, 'update'])->middleware('admin')->name('karyawan.update');
    Route::delete('/delete-karyawan/{id}', [UserController::class, 'destroy'])->middleware('admin')->name('karyawan.destroy');

    // BARANG ROUTES
    Route::get('/barang', [BarangController::class, 'index'])->middleware('admin')->name('barang.index');
    Route::get('/create-barang', [BarangController::class, 'create'])->middleware('admin')->name('barang.create');
    Route::post('/store-barang', [BarangController::class, 'store'])->middleware('admin')->name('barang.store');
    Route::get('/edit-barang/{id}', [BarangController::class, 'edit'])->middleware('admin')->name('barang.edit');
    Route::put('/update-barang', [BarangController::class, 'update'])->middleware('admin')->name('barang.update');
    Route::delete('/delete-barang/{id}', [BarangController::class, 'destroy'])->middleware('admin')->name('barang.destroy');

    // KATEGORI BARANG ROUTES
    Route::get('/barang-category', [BarangCategoryController::class, 'index'])->middleware('admin')->name('barang-category.index');
    Route::get('/create-barang-category', [BarangCategoryController::class, 'create'])->middleware('admin')->name('barang-category.create');
    Route::post('/store-barang-category', [BarangCategoryController::class, 'store'])->middleware('admin')->name('barang-category.store');
    Route::get('/edit-barang-category/{id}', [BarangCategoryController::class, 'edit'])->middleware('admin')->name('barang-category.edit');
    Route::put('/update-barang-category', [BarangCategoryController::class, 'update'])->middleware('admin')->name('barang-category.update');
    Route::delete('/delete-barang-category/{id}', [BarangCategoryController::class, 'destroy'])->middleware('admin')->name('barang-category.destroy');
    
    // TRANSAKSI ROUTES
    Route::get('/transaksi-list', [TransaksiController::class, 'index'])->middleware('admin')->name('transaksi.index');
    Route::get('/create-transaksi', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/store-transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/{id}', [TransaksiController::class, 'show'])->name('transaksi.show');

    // Route::resource('karyawan', UserController::class)->middleware('admin');
    // Route::resource('stock', StockController::class)->middleware('admin');
    // Route::resource('transactions', TransactionController::class);
    // Route::resource('products', ProductController::class);
    // Route::resource('sales', SalesController::class);
});


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
