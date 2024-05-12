<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\User;

class UserController extends Controller
{
    public function showProfile()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userName = $user->name;
            $userEmail = $user->email;
            return view('profileUser', compact('userName', 'userEmail'));
        } else {
            return redirect()->route('loginPage');
        }
    }
}
