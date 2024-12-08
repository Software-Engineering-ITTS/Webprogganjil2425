<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

Route::post('/login', [LoginController::class, 'login']);
Route::get('/buatbuku', [BukuController::class, 'buatbuku']);
Route::post('/belibuku', [BukuController::class, 'belibuku']);
Route::get('/editbuku/{id}', [BukuController::class, 'editbuku']);
Route::post('/updatebuku/{id}', [BukuController::class, 'updatebuku']);
Route::delete('/hapusbuku/{id}', [BukuController::class, 'hapusbuku']);
Route::get('/sukses',function(){
    return view('sukses');
});
});
