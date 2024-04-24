<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password as PasswordRules;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Models\User;

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
        return view('password.forgot', [
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

        return view('password.forgot', $result);
    }

    public function resetPassword(Request $request, $token)
    {
        return view('reset-password', ['token' => $token]);
    }

    public function updatePassword(Request $request, $token)
    {
        $request->only([
            'password',
            'password_confirmation',
            'token',
        ]);

        $request->validate(
            [
                'password' => ['required', 'confirmed', PasswordRules::defaults()],
                'token' => 'required',
            ],
            [
                'password.required' => 'O campo senha é obrigatório',
                'password.confirmed' => 'As senhas informadas não são iguais',
                'password.min' => 'A senha informada deve ter no mínimo 6 caracteres',
                'password.max' => 'A senha informada deve ter no máximo 64 caracteres',
                'password.numbers' => 'A senha informada deve conter números',
                'password.uncompromised' => 'A senha informada foi comprometida em um vazamento de dados',
            ]
        );

        $email = DB::table('password_reset_tokens')
            ->where('token', $token, 'and', 'created_at', '>', now()->subHour())
            ->value('email');

        if (!$email) {
            return back()->withErrors([
                'token' => 'Token inválido.',
            ]);
        }

        $status = Password::reset(
            $request->only('password', 'password_confirmation', 'token') + ['email' => $email],
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ]);
                // Invalida 'remember me' tokens
                $user->setRememberToken(Str::random(60));
                $user->save();

                // Notifica o usuário sobre a alteração de senha
                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            DB::table('password_reset_tokens')
                ->where('email', $email)
                ->delete();
        }

        return $status === Password::PASSWORD_RESET
            ? redirect('/login')->with('status', 'Senha alterada com sucesso.')
            : back()->withErrors([
                'password' => 'Erro ao alterar a senha.',
            ]);

    }

}
