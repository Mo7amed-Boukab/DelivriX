<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login.page');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->middleware('guest')->name('register.page');

