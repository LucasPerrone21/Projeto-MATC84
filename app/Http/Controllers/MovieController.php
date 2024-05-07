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
        $movie=$this->objMovie->all();
        
        return view('admin', compact('movie'));
    }
    
    public function store(MovieRequest $request)
    {
        $img = file_get_contents($_FILES['image']['tmp_name']);
        $img_type = $_FILES['image']['type'];
        $movies = $this->objMovie->create([
            'title' => $request->title,
            'description' => $request->description,
            'gender_movie' => $request->gender_movie,
            'image' => $img,
            'image_type' => $img_type
        ]);

        if($movies){
            return redirect(to: 'administrador')->with('message', 'Filme cadastrado com sucesso!');
        }

    }

    public function destroy($id){
        $del = Movie::find($id);
        $del->delete();
        return redirect('administrador')->with('message', 'Filme apagado com sucesso!');
    }


    public function edit($id)
    {
        $movie = $this->objMovie->find($id);
    
        return view('editMovie', compact('movie'));
    }
    
    
}
