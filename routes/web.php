<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/administrador', function () {
    return view('home');
});


Route::get('/cadastrar-filme', 'App\Http\Controllers\MovieController@showCreateMovieForm');

Route::get('/cadastro', 'App\Http\Controllers\RegisterController@showRegistrationForm');
Route::post('/cadastroUser', 'App\Http\Controllers\RegisterController@register');

Route::get('/login', 'App\Http\Controllers\LoginController@showLoginForm');


