<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function showCreateMovieForm()
    {
        return view('createMovie');
    }
    //
}
