<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\User;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        if ($user->is_admin) {
            return view('profileAdm');
        }
        else {
            return view('profileUser');
        }
    return redirect('login');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        try {
            $user->save();
            return redirect('usuario');
        }
        catch (\Exception $e) {
            return redirect('perfil')->with('error', 'Erro ao atualizar usuário');
        }
    }
}