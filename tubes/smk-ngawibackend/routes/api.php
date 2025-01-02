<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PendaftaranController;
use App\Models\Wali;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return response()->json([
        'success' => true,
        'message' => 'detail logged in user',
        'data' => $request->user()
    ]);
});

Route::resource('jurusan', JurusanController::class)
->only('index', 'show', 'store', 'updateJurusan', 'destroy');
Route::put('/jurusan/{jurusan}',[JurusanController::class, 'update']);
Route::resource('pendaftaran', PendaftaranController::class)
->only('index', 'show', 'store', 'destroy');


require __DIR__.'/auth.php';


