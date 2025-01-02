<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\PresensiController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;


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
        return view('welcome');
    });

Route::get('/register', [AuthController::class, 'RegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'LoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard');
    // })->name('dashboard.admin');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard.admin');
    Route::post('/admin/events', [EventController::class, 'store'])->name('admin.event.create');
    Route::get('/admin/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
    Route::post('/admin/registrations/verify', [RegistrationController::class, 'verify'])->name('registrations.verify');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('user.dashboard', );
    // })->name('dashboard.user');
    Route::get('/dashboard', [EventController::class, 'ListEvent'])->name('ListEvent');
    Route::get('/events', [EventController::class, 'list'])->name('events.list');
    Route::post('/events/register', [RegistrationController::class, 'register'])->name('events.register');
    Route::get('/events/attendance', [RegistrationController::class, 'viewFormAttendance'])->name('attendance.view');
    Route::post('/events/attendance/submit', [RegistrationController::class, 'submitAttendance'])->name('attendance.submit');

});
