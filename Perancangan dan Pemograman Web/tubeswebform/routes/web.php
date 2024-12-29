<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;

// Guest Routes (untuk yang belum login)
Route::middleware('guest')->group(function () {
    // Redirect root ke login
    Route::get('/', function () {
        return redirect('/login');
    });
    
    // Login routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});

// Protected Routes (untuk yang sudah login)
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [DashboardController::class, 'index']);
    // Customers
    Route::resource('customers', CustomerController::class);

    // Invoices
    Route::resource('invoices', InvoiceController::class);
    Route::group(['prefix' => 'invoices', 'as' => 'invoices.'], function () {
        Route::get('{invoice}/pdf', [InvoiceController::class, 'generatePDF'])->name('pdf');
        Route::get('{invoice}/print', [InvoiceController::class, 'print'])->name('print');
    });

    // Payments
    Route::resource('payments', PaymentController::class);
    Route::group(['prefix' => 'payments', 'as' => 'payments.'], function () {
        Route::get('filter', [PaymentController::class, 'filter'])->name('filter');
        Route::get('export', [PaymentController::class, 'export'])->name('export');
    });
});