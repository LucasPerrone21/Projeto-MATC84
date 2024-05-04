<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Requests\MovieRequest;


class MovieController extends Controller
{
    private $objMovie;

    public function __construct(){
        $this->objMovie = new Movie();
    }
    public function create()
    {
        return view('createMovie');
    }
    //
    public function index(){
        return view('admin');
    }
    
    public function store(MovieRequest $request)
    {
        $movies = $this->objMovie->create([
            'title' => $request->title,
            'description' => $request->description,
            'gender_movie' => $request->gender_movie,
            'image' => $request->image,
        ]);

        if($movies){
            return redirect(to: 'administrador')->with('message', 'Filme cadastrado com sucesso!');
        }

    }
}
