<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cadastro', 'App\Http\Controllers\RegisterController@showRegistrationForm');
Route::post('/cadastroUser', 'App\Http\Controllers\RegisterController@register');
Route::get('/login', 'App\Http\Controllers\LoginController@showLoginForm');

Route::get('/forgot-password', [
    LoginController::class,
    'forgotPassword'
])->middleware('guest')->name('password.forgot');

Route::post('/forgot-password', [
    LoginController::class,
    'sendResetToken'
])->middleware('guest')->name('password.sendResetToken');

Route::get('/reset-password/{token}', [
    LoginController::class,
    'resetPassword'
])->middleware('guest')->name('password.reset');

Route::post(
    'reset-password',
    [LoginController::class, 'updatePassword']
)->middleware('guest')->name('password.update');
