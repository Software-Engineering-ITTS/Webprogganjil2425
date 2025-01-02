<?php

use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ApprovalDokumenController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\DashboardStaffController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [loginController::class, 'showLoginForm'])->name('Auth.login');
Route::post('/login', [loginController::class, 'login']);
Route::post('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/register', [registerController::class, 'index'])->name('Auth.register');
Route::post('/register', [registerController::class, 'store']);


Route::get('/dashboardadmin', [DashboardAdminController::class, 'index'])->name('DashboardAdmin.dashboardadmin');
Route::post('/dashboardadmin/store', [DashboardAdminController::class, 'store'])->name('DashboardAdmin.store');
Route::delete('/document/{id}', [DashboardAdminController::class, 'destroy'])->name('DashboardAdmin.destroy');

Route::get('/dashboardstaff', [DashboardStaffController::class, 'index'])->name('DashboardAdmin.dashboardstaff');
Route::post('/dashboardstaff/store', [DashboardStaffController::class, 'store'])->name('DashboardAdmin.store');
Route::delete('/document/{id}', [DashboardStaffController::class, 'destroy'])->name('DashboardAdmin.destroy');

Route::get('/approval', [ApprovalDokumenController::class, 'index'])->name('DashboardAdmin.approval-dokumen');
Route::get('/api/pending-documents', [ApprovalDokumenController::class, 'DashboardAdmin.getPendingDocuments']);
Route::post('/api/approve-document/{id}', [ApprovalDokumenController::class, 'DashboardAdmin.approve']);
Route::post('/api/reject-document/{id}', [ApprovalDokumenController::class, 'DashboardAdmin.reject']);