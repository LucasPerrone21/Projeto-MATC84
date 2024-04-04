<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        if(strlen($request->password) < 6){
            return redirect('/cadastro')->withErrors(['A Senha deve ter no mínimo 6 caracteres!']);
        }
        $user->password = bcrypt($request->password);
        $user->is_admin = False;

        $validacao = !auth()->attempt($request->only('email','password'));
        if ($validacao) {
            return redirect('/cadastro')->withErrors(['Email já cadastrado no Sistema!']);
        } 

        
        $user->save();

        return redirect('/login');
    }
}
