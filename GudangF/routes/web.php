<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenambahanController;
use App\Http\Controllers\AmbilController;


    Route::get('/index', function () {
        return view('index');
    })->name('home');

    Route::get("/tambahbarang", [PenambahanController::class, "penambahan"]);
    Route::post("/tambahbarang", [PenambahanController::class, "penambahanPost"])->name("penambahan.post");
    Route::get("/lihatbarang", [PenambahanController::class, "lihatbarang"])->name("lihat");
    Route::get("/aturbarang", [PenambahanController::class, 'aturbarang']);
    Route::resource('penambahans', PenambahanController::class)->except(['show', 'create', 'store']);


Route::get("/", [AuthController::class, "login"])->name("login");
Route::post("/login", [AuthController::class, "loginPost"])->name("login.post");
Route::get("/register", [AuthController::class, "register"])->name("register");
Route::post("/register", [AuthController::class, "registerPost"])->name("register.post");

Route::get('/ambilbarang/{penambahan}', [AmbilController::class, 'ambilForm'])->name('ambil.form');
Route::post('/ambilbarang/{penambahan}', [AmbilController::class, 'ambilPost'])->name('ambil.post');
