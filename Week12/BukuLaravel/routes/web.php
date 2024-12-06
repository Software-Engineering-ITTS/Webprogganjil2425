<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Models\Buku;

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
//     return view('index', [
//         'name' => 'Mufid Nursirot Jati',
//         'kota' => 'Surabaya'
//     ]);
// });

Route::resource('/TokoBuku', BukuController::class);
Route::resource('transaction', TransactionController::class);

// Route untuk daftar buku
Route::get('/TokoBuku', [BukuController::class, 'index'])->name('TokoBuku.index');

// Route untuk form tambah buku
Route::get('/TokoBuku/create', [BukuController::class, 'create'])->name('TokoBuku.create');

// Route untuk menyimpan buku baru
Route::post('/TokoBuku', [BukuController::class, 'store'])->name('TokoBuku.store');

// Route untuk form edit buku
Route::get('/TokoBuku/{id}/edit', [BukuController::class, 'edit'])->name('TokoBuku.edit');

// Route untuk update buku
Route::put('/TokoBuku/{id}', [BukuController::class, 'update'])->name('TokoBuku.update');

// Route untuk hapus buku
Route::delete('/TokoBuku/{id}', [BukuController::class, 'destroy'])->name('TokoBuku.destroy');

// // Route untuk list transaction 
Route::get('/transaction/index', [TransactionController::class, 'index'])->name('transaction.index');

// // Route untuk form tambah transaction 
Route::get('/transaction', [TransactionController::class, 'create'])->name('transaction.create');

// // Route untuk menyimpan transaction baru
Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');

// // Route untuk form edit transaction 
Route::get('/transaction/{id}/edit', [TransactionController::class, 'edit'])->name('transaction.edit');

// // Route untuk update transaction 
Route::put('/transaction/{id}', [TransactionController::class, 'update'])->name('transaction.update');

// // Route untuk delete transaction 
Route::delete('/TokoBuku/{id}', [TransactionController::class, 'delete'])->name('transaction.destroy');
