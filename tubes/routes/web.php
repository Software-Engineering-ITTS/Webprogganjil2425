<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [AuthController::class, 'home'])->name('home');
Route::get('/', [AuthController::class, 'search'])->name('search.home');

Route::middleware('auth', 'role:admin')->group(function () {

    Route::view('/dashboard', [AdminController::class, 'layouts.sidebar'])->name('dashboard');
    Route::get('/dashboard/admin', [AdminController::class, 'dashboardAdmin']);

    // Route::get('/dashboard/data-anggota', [AdminController::class, 'dataanggota']);
    Route::get('/dashboard/data-anggota', [AdminController::class, 'showDataAnggota']);
    Route::get('/dashboard/data-anggota/search-user', [AdminController::class, 'search'])->name('search.anggota');
    Route::get('/dashboard/data-anggota/infokegiatan{id}', [AdminController::class, 'showInfoAnggota']);

    // Route::get('/dashboard/data-kegiatan', [AdminController::class, 'datakegiatan']);
    Route::get('/dashboard/data-kegiatan', [AdminController::class, 'showDataKegiatan']);
    Route::get('/dashboard/data-kegiatan/info{id}', [AdminController::class, 'infoKegiatan']);
    Route::get('/dashboard/data-anggota/search-kegiatan', [AdminController::class, 'searchKegiatan'])->name('search.kegiatan');
    Route::post('/dashboard/data-kegiatan-form', [AdminController::class, 'store'])->name('store');
    Route::get('/dashboard/{id}/data-kegiatan-edit', [AdminController::class, 'edit'])->name('edit');
    Route::put('/dashboard/data-kegiatan/update-{id}', [AdminController::class, 'update'])->name('update');
    Route::delete('/dashboard/data-kegiatan/{id}', [AdminController::class, 'destroy'])->name('destroy');
});

Route::middleware('auth', 'role:anggota')->group(function () {
    Route::view('/dashboard-anggota', [AnggotaController::class, 'dashboard'])->name('dashboard.anggota');

    Route::get('/dashboard-anggota/profile', [AnggotaController::class, 'profile']);
    Route::get('/dashboard-anggota/kegiatan', [AnggotaController::class, 'kegiatan']);
    Route::get('/dashboard/anggota/kegiatan-search', [AdminController::class, 'search'])->name('search.kegiatan');
    Route::get('/dashboard-anggota/{kegiatanId}', [AnggotaController::class, 'iuran'])->name('iuran');
    Route::post('/dashboard-anggota/join{kegiatanId}', [AnggotaController::class, 'join'])->name('join');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name("login.post");

    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'registerPost'])->name("register.post");
});
