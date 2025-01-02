<?php

use App\Http\Controllers\EventController;

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Models\Event;
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

Route::get('/', function () {
    return view('auth/login-register');
});


// Route::get('/login-register', function () {
//     return view('auth/login-register');
// });

// Route untuk halaman login dan register
Route::get('/register', function () {
    return view('auth/register');
});
Route::get('/login', function () {
    return view('auth/login');
});

// Proses login dan register
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Admin langsung login tanpa register
// Route::get('/admin/login', [AuthController::class, 'adminLogin']);

// Dashboard
Route::get('/user/daftar', function () {
    // return 'Welcome User!';
});

Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
});

// Route untuk membuat event
Route::get('/admin/create_events', [EventController::class, 'create'])->name('event.create');
Route::post('/admin/create_events', [EventController::class, 'store'])->name('event.store');

// Route untuk menampilkan daftar event
Route::get('/admin/dashboard', [EventController::class, 'index'])->name('event.index');

// Route untuk menampilkan form edit event
Route::get('/admin/event/{eventId}/edit', [EventController::class, 'edit'])->name('event.edit');

// Route untuk menyimpan perubahan event
Route::post('/admin/event/{eventId}/edit', [EventController::class, 'update'])->name('event.update');


Route::get('/dashboard', [EventController::class, 'showEvents'])->name('user.events');
Route::post('/user/daftar/{id}', [EventController::class, 'registerEvent'])->name('user.event.register');

// routes/web.php
Route::delete('/admin/event/{event}', [EventController::class, 'destroy'])->name('event.destroy');

Route::get('/admin/calendar', [EventController::class, 'showCalendar'])->name('admin.calendar');




Route::get('/user/daftar', [RegistrationController::class, 'create'])->name('register.create');
Route::get('/user/daftar', function () {
    $events = Event::where('id', Auth::id())->get(); 
    return view('user/daftar');
});
Route::post('/user/daftar', [RegistrationController::class, 'store'])->name('register.store');
Route::get('/user/daftar', [EventController::class, 'showEvents'])->name('register.create');






// Menampilkan peserta yang sudah membeli tiket untuk event tertentu
Route::get('/admin/{eventId}/view_participants', [EventController::class, 'showParticipants'])->name('event.participants');

// Route::get('/', function () {
//     return view('home');  // Sesuaikan dengan file view Anda
// });


// Logout
Route::post('/logout', [AuthController::class, 'logout']);

// use App\Http\Controllers\AuthController;

// Route::get('/register', function () {
//     return view('auth.register');
// });
// Route::get('/login', function () {
//     return view('auth.login');
// });

// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);


