<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cadastro', [RegisterController::class, 'showRegistrationForm'])->name('registerPage');
Route::post('/cadastro', [RegisterController::class, 'register'])->name('registerForm');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('loginPage');
Route::post('/login', [LoginController::class, 'login'])->name('loginForm');


