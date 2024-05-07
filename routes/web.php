<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('login');
// });

// Route::get('/administrador', function () {
//     return view('home');
// });

Route::get('/administrador', 'App\Http\Controllers\MovieController@index');
Route::get('/cadastrar-filme', 'App\Http\Controllers\MovieController@create');
Route::get('/editar-filme/{id}', 'App\Http\Controllers\MovieController@edit')->name('edit.movie');
//Route::get('/editar-filme/{id}', 'MovieController@edit')->name('edit.movie');
Route::post('/cadastrar-filme', 'App\Http\Controllers\MovieController@store');

Route::get('/cadastro', [RegisterController::class, 'showRegistrationForm'])->name('registerPage');
Route::post('/cadastro', [RegisterController::class, 'register'])->name('registerForm');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('loginPage');
Route::post('/login', [LoginController::class, 'login'])->name('loginForm');

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
