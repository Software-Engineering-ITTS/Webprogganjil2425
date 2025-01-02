<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DetailController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\PengaduanController;
use App\Http\Controllers\User\TanggapanController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('pengaduan', [PengaduanController::class, 'index'])->name('user.pengaduan');
    Route::post('pengaduan', [PengaduanController::class, 'store'])->name('complaints.store');
    Route::get('tanggapan', [TanggapanController::class, 'index'])->name('user.tanggapan');
    Route::get('user/{id}', [TanggapanController::class, 'show'])->name('user.show');
});

Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/index', [ReportController::class, 'index'])->name('admin.index');
    Route::get('/admin/detail/{id}', [DetailController::class, 'show'])->name('admin.detail');
    Route::post('/admin/responses', [DetailController::class, 'storeResponse'])->name('responses.store');
    Route::post('/admin/detail/{id}/update-status', [DetailController::class, 'updateStatus'])->name('admin.detail.updateStatus');
});