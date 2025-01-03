<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\userController;
use App\Http\Controllers\feedbackController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['guest'])->group(function () {
    
// });

// Route::get('/home', function () {
//     return redirect('/admin');
// });


        Route::get('/', [authController::class, 'index'])-> name('login');
        Route::post('/', [authController::class, 'login'])-> name('login');

        Route::get('/register', [authController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [authController::class, 'register'])->name('post.register');

        Route::get('/logout', [authController::class, 'logout'])-> name('logout');

        Route::get('/admin', [adminController::class, 'index'])-> name('admin');
        Route::get('/ulasan',[adminController::class, 'user'])->name('ulasan');
        Route::get('/admin/ulasan', [adminController::class, 'user'])->name('admin.ulasan');

        Route::get('/home', [userController::class, 'user'])-> name('home');
        Route::get('/user/home', [userController::class, 'home'])->name('user.home');

        Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
        Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');
        // Route::post('/feedback', [FeedbackController::class, 'store'])->name('store');
        Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');


        
