<?php

use App\Http\Controllers\TableuserController;
use App\Http\Controllers\PerizinanController;
use Illuminate\Support\Facades\Route;
use App\Models\perizinan;

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

Route::resource('/tableuser', TableuserController::class);
Route::post('/login', [TableuserController::class, 'login']);
Route::get('/logout', [TableuserController::class, 'logout']);
Route::post('/aksiregister', [TableuserController::class, 'aksiregister']);

Route::get('/register', function () {
    if (session('level')== 1 || session('level')== 2) {
        return redirect('/home');
    }
    return view('register'); 
});

Route::get('/approveperizinan/{id}', [PerizinanController::class, 'approveperizinan']);
Route::get('/declineperizinan/{id}', [PerizinanController::class, 'declineperizinan']);
Route::get('/cetakperizinan/{id}', [PerizinanController::class, 'cetakperizinan']);
Route::post('/perizinanmahasiswa', [PerizinanController::class, 'perizinanmahasiswa']);
// Route::resource('/transaksi', TransaksiController::class);


Route::get('/', function () {
    if (session('level')== 1 || session('level')== 2) {
        return redirect('/home');
    }
    return view('login'); 
});

Route::get('/home', function () {
    if (session('level') == 1) {
        $listPerizinan = perizinan::listPerizinan();
        return view('admin', compact('listPerizinan')); 
    }
    elseif (session('level') == 2 ) {
        $listPerizinanUseronly = perizinan::listPerizinanUseronly();
        return view('user', compact('listPerizinanUseronly'));
    }
    else {
        return redirect('/');
    }
});