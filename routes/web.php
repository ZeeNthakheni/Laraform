<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\submissions_controller;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubmissionController as AdminSubmissionController;
 
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


Route::get('/', [submissions_controller::class, 'index']);
Route::post('/submit', [submissions_controller::class, 'submit']);

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('submissions', AdminSubmissionController::class)->names([
        'index' => 'admin.submissions.index',
        'create' => 'admin.submissions.create',
        'store' => 'admin.submissions.store',
        'show' => 'admin.submissions.show',
        'edit' => 'admin.submissions.edit',
        'update' => 'admin.submissions.update',
        'destroy' => 'admin.submissions.destroy',
    ]);
});

