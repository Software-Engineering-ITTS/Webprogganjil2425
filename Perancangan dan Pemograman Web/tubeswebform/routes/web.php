<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;

// Route untuk Dashboard
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Routes untuk Customer
Route::resource('customers', CustomerController::class);

// Routes untuk Invoice
Route::resource('invoices', InvoiceController::class);

// Routes untuk Payment
Route::resource('payments', PaymentController::class);

// Route tambahan untuk Invoice
Route::group(['prefix' => 'invoices', 'as' => 'invoices.'], function () {
    // Generate PDF Invoice
    Route::get('{invoice}/pdf', [InvoiceController::class, 'generatePDF'])->name('pdf');
    // Print Invoice
    Route::get('{invoice}/print', [InvoiceController::class, 'print'])->name('print');
});

// Route tambahan untuk Payment
Route::group(['prefix' => 'payments', 'as' => 'payments.'], function () {
    // Filter payments by date range
    Route::get('filter', [PaymentController::class, 'filter'])->name('filter');
    // Export payments report
    Route::get('export', [PaymentController::class, 'export'])->name('export');
});
