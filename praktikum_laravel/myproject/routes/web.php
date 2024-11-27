<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
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

Route::get('/form', function () {
    return view('form', [
        'pesan' => ''
    ]);
});

// Route::get('/', function () {
//     return view('index');
//     // $mahasiswas = DB::table('mahasiswas')->get();

    
//     // return view('index', [
//     //     'mahasiswas' => $mahasiswas
//     // ]);
// });

Route::get('/', [MahasiswaController::class, 'index']);

Route::resource('/mahasiswa', MahasiswaController::class);


// Route::get('/index', function () {
//     return view('index');
// });