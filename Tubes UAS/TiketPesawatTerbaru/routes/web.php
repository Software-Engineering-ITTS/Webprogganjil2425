<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('login_choice');
});

Route::get('login-choice', function () {
    return view('login_choice');
})->name('login.choice');

Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login']);
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->middleware('checkAdminLogin')->name('admin.dashboard');
Route::post('admin/logout', [AdminController::class, 'logout']);

Route::get('user/login', [UserController::class, 'showLoginForm'])->name('user.login');
Route::post('user/login', [UserController::class, 'login'])->name('user.login.submit');
Route::post('user/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('user/register', [UserController::class, 'showRegistrationForm'])->name('user.register');
Route::post('user/register', [UserController::class, 'register'])->name('user.register.submit');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('tickets', [TicketController::class, 'index'])->name('tickets.index'); // Daftar tiket
    Route::get('tickets/create', [TicketController::class, 'create'])->name('tickets.create'); // Form buat tiket
    Route::post('tickets', [TicketController::class, 'store'])->name('tickets.store'); // Menyimpan tiket baru
});

Route::get('admin/tickets/{id}/edit', [TicketController::class, 'edit'])->name('admin.tickets.edit');
Route::put('admin/tickets/{id}', [TicketController::class, 'update'])->name('admin.tickets.update');
Route::delete('admin/tickets/{id}', [TicketController::class, 'destroy'])->name('admin.tickets.destroy');

Route::prefix('user')->name('user.')->group(function () {
    Route::post('tickets/order/{id}', [TicketController::class, 'orderTicket'])->name('tickets.order'); // Pemesanan tiket
    Route::get('tickets/history', [TicketController::class, 'orderHistory'])->name('tickets.history');
});

Route::post('/tickets/order/{ticket}', [OrderController::class, 'order'])->name('user.tickets.order');
Route::get('/user/tickets', [TicketController::class, 'listAvailableTickets'])->name('user.tickets.index');
Route::get('/orders', [OrderController::class, 'showOrdersHistory'])->name('user.orders.history');
Route::get('/admin/transactions', [PaymentController::class, 'viewTransactions'])->name('admin.transactions');
Route::get('/user/payment/{orderId}', [PaymentController::class, 'pay'])->name('user.payment');
Route::post('/user/payment/{orderId}', [PaymentController::class, 'processPayment'])->name('user.payment.process');
Route::get('/admin/transactions', [OrderController::class, 'adminTransactions'])->name('admin.transactions');

Route::prefix('user')->middleware('auth')->group(function() {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/create-order/{ticketId}', [OrderController::class, 'create'])->name('user.create-order'); // Form pemesanan
    Route::post('/store-order', [OrderController::class, 'store'])->name('user.store-order'); // Menyimpan pesanan
    Route::get('/history', [OrderController::class, 'showOrdersHistory'])->name('user.history'); // Riwayat pesanan
    Route::get('/view-ticket/{orderId}', [OrderController::class, 'viewTicket'])->name('user.view-ticket'); // Lihat tiket
    Route::patch('/user/orders/{order}/check-in', [OrderController::class, 'checkIn'])->name('user.orders.checkin');
});



