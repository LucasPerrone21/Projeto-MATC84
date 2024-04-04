<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'E-mail ou senha incorretos.',
        ]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
