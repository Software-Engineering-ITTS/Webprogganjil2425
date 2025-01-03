<?php   

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Customer\OrderController;

// Rute Login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

// Halaman Dashboard Setelah Login
Route::get('/home', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('admin.product.index');
    } elseif (auth()->check() && auth()->user()->role === 'customer') {
        return redirect()->route('customer.order.create');
    }
    return redirect()->route('login');
})->name('home')->middleware('auth');

// Rute Register
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Rute Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routing untuk Admin
Route::prefix('admin')
    ->middleware(['auth', 'role:admin']) // Middleware untuk memverifikasi role admin
    ->name('admin.')
    ->group(function () {
        Route::get('product', [ProductController::class, 'index'])->name('product.index');
        Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('product', [ProductController::class, 'store'])->name('product.store');
        Route::get('product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('product/{product}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
        
        // Admin dapat melacak dan mengubah status pesanan
        Route::get('track', [OrderController::class, 'track'])->name('track'); // Halaman pelacakan untuk admin
        Route::put('orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus'); // Admin mengubah status
    });

// Routing untuk Customer
Route::prefix('customer')
    ->middleware('auth') // Hanya pelanggan yang login yang dapat mengakses
    ->name('customer.')
    ->group(function () {
        Route::get('order/create', [OrderController::class, 'create'])->name('order.create');
        Route::post('order', [OrderController::class, 'store'])->name('order.store');
        
        // Customer hanya dapat melacak pesanan (tidak dapat mengubah status)
        Route::get('track', [OrderController::class, 'track'])->name('track'); // Halaman pelacakan untuk customer
    });
