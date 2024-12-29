<?php

use App\Http\Controllers\AircraftController;
use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Controllers\Auth\Admin\RegisteredController;
use Illuminate\Support\Facades\Route;
use App\Models\Aircraft;

// Grup route untuk admin tamu (belum login)
Route::prefix('admin')->middleware('guest:admin')->group(function () {

    Route::get('register', [RegisteredController::class, 'create'])->name('admin.register');
    Route::post('register', [RegisteredController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [LoginController::class, 'store']);
});

// Grup route untuk admin yang sudah login
Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/addproduct', function () {
        return view('admin.addproduct');
    })->name('admin.addproduct');


    Route::post('/addproduct', [AircraftController::class, 'store'])
        ->name('admin.addproduct.submit');

    Route::get('/history', function () {
        return view('admin.history');
    })->name('admin.history');

    // show all product
    Route::get('/listproduct', function () {
        $aircrafts = Aircraft::all();
        return view('admin.listproduct', compact('aircrafts'));
    })->name('admin.listproduct');

    Route::get('/listproduct/{id?}', function ($id = null) {
        if ($id) {
            $aircraft = Aircraft::findOrFail($id);
            return view('admin.listproduct', compact('aircraft'));
        } else {
            $aircrafts = Aircraft::all();
            return view('admin.listproduct', compact('aircrafts'));
        }
    })->name('admin.listproduct');

    // edit product
    Route::get('/admin/aircraft/edit/{id}', [AircraftController::class, 'edit'])->name('admin.aircraft.edit');
    Route::put('/admin/aircraft/update/{id}', [AircraftController::class, 'update'])->name('admin.aircraft.update');
    Route::delete('/admin/delete/{id}', [AircraftController::class, 'destroy'])->name('admin.aircraft.delete');

    Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');
});
