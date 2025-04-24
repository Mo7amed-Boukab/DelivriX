<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LivreurController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginPage'])->middleware('guest')->name('login.page');
Route::get('/register', [AuthController::class, 'showRegisterPage'])->middleware('guest')->name('register.page');

Route::post('/login', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'login'])->name('login');


Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
 Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'isLivreur'])->prefix('livreur')->group(function () {
 Route::get('/dashboard', [LivreurController::class, 'index'])->name('livreur.dashboard');
});

Route::middleware(['auth', 'isClient'])->prefix('client')->group(function () {
 Route::get('/dashboard', [ClientController::class, 'index'])->name('client.dashboard');
});

Route::get('/auth/google/redirect', [AuthController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');
