<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\MovieEditRequest;



class MovieController extends Controller
{
    private $objMovie;

    public function __construct()
    {
        $this->objMovie = new Movie();
    }
    public function create()
    {
        return view('createMovie');
    }
    //
    public function index()
    {
        $movie = $this->objMovie->all();

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

        if ($movies) {
            return redirect(to: 'administrador')->with('message', 'Filme cadastrado com sucesso!');
        }

    }

    public function destroy($id)
    {
        $del = Movie::find($id);
        $del->delete();
        return redirect('administrador')->with('message', 'Filme apagado com sucesso!');
    }


    public function edit($id)
    {
        $movie = $this->objMovie->find($id);

        return view('editMovie', compact('movie'));
    }

    public function indexUser()
    {
        $movie = $this->objMovie->all();

        return view('user', compact('movie'));
    }

    public function update(MovieEditRequest $request, $id)
    {
        if ($_FILES['image']['tmp_name']) {
            $img = file_get_contents($_FILES['image']['tmp_name']);
            $img_type = $_FILES['image']['type'];
            $this->objMovie->where(['id' => $id])->update([
                'title' => $request->title,
                'description' => $request->description,
                'gender_movie' => $request->gender_movie,
                'image' => $img,
                'image_type' => $img_type
            ]);
        } else {
            $this->objMovie->where(['id' => $id])->update([
                'title' => $request->title,
                'description' => $request->description,
                'gender_movie' => $request->gender_movie,
            ]);
        }



        return redirect(to: 'administrador')->with('message', 'Filme atualizado com sucesso!');
    }

    public function rent_movie(Movie $movie): JsonResponse
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized.', 'success' => false, 'redirect' => false], 401);
        }
        if (!$movie) {
            return response()->json(['error' => 'Filme não encontrado.', 'success' => false, 'redirect' => false], 404);
        }
        // insert into current_rent_movie_user_link a new row with the user_id and movie_id, but first check if the user isn't already renting the movie
        try {
            $user->movies()->attach($movie->id);
        } catch (\Exception $e) {
            return response()->json(['error' => 'O usuário já está alugando esse filme.', 'success' => false, 'redirect' => false], 400);
        }
        return response()->json(['error' => null, 'success' => true, 'redirect' => true], 200);
    }

}
