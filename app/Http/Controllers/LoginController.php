<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

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

    public function forgotPassword()
    {
        return view('forgot-password', [
            'status' => null,
            'email' => null,
            'error' => null,
        ]);
    }

    public function sendResetToken(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        $result = [
            'status' => $status,
            'email' => $request->email,
            'error' => $status === Password::RESET_LINK_SENT ? null : $status,
        ];

        return view('forgot-password', $result);
    }
}
