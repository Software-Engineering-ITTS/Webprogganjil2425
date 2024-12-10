<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes yang membutuhkan authentication
Route::middleware(['auth'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
    // Book routes untuk semua user
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
    
    // Transaction routes untuk semua user
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::post('/books/{book}/buy', [TransactionController::class, 'store'])->name('books.buy');
    
    // Admin only routes
    Route::middleware(['admin'])->group(function () {
        // Book management
        Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
        Route::post('/books', [BookController::class, 'store'])->name('books.store');
        Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
        Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
        
        // Admin dashboard & reports
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        
        Route::get('/admin/reports', function () {
            return view('admin.reports');
        })->name('admin.reports');
    });
});

// Fallback route untuk 404
Route::fallback(function () {
    return view('errors.404');
});