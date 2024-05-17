<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Database\UniqueConstraintViolationException;
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
        // se o usuário não for admin, redireciona para a página de usuário
        $user = auth()->user();
        if ($user && !$user->is_admin) {
            return redirect(route('user.index'));
        } elseif (!$user) {
            return redirect(route('loginPage'));
        }
        return view('createMovie');
    }
    //
    public function index()
    {
        $movie = $this->objMovie->all();
        $user = auth()->user();
        if ($user) {
            if ($user->is_admin) {
                return view('admin', compact('movie'));
            }
            return view('user', compact('movie'));
        }
        return redirect('login');
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
            return redirect(to: 'usuario')->with('message', 'Filme cadastrado com sucesso!');
        }

    }

    public function destroy($id)
    {
        $del = Movie::find($id);
        $del->delete();
        return redirect('usuario')->with('message', 'Filme apagado com sucesso!');
    }


    public function edit($id)
    {
        $movie = $this->objMovie->find($id);

        return view('editMovie', compact('movie'));
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



        return redirect(to: 'usuario')->with('message', 'Filme atualizado com sucesso!');
    }

    public function rent_movie(Movie $movie)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized.', 'success' => false], 401);
        }
        try {
            $user->movies_renting()->attach($movie->id, ['created_at' => now(), 'updated_at' => now()]);
        } catch (UniqueConstraintViolationException $e) {

            return redirect()->back()->with('message', 'O usuário já está alugando esse filme.');


        }

        return redirect('usuario#meusFilmes')->with('message', 'Filme alugado com sucesso.');
    }

    public function return_movie(Movie $movie)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized.', 'success' => false], 401);
        }
        $detached = $user->movies_renting()->detach($movie->id);
        if (!$detached) {
            return response()->json(['error' => 'O usuário não está alugando esse filme.', 'success' => false], 400);
        }
        $user->movies_previously_rented()->attach($movie->id, ['created_at' => now(), 'updated_at' => now()]);
        return redirect('usuario#meusFilmes')->with('message', 'Filme alugado com sucesso.');
    }

}
