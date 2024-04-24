<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

Route::get('/cadastro', 'App\Http\Controllers\RegisterController@showRegistrationForm');
Route::post('/cadastroUser', 'App\Http\Controllers\RegisterController@register');
Route::get('/login', 'App\Http\Controllers\LoginController@showLoginForm');


