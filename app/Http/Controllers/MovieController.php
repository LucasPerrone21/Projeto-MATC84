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

    public function indexUser()
    {
        $movie = $this->objMovie->all();

        $isAdmin = auth()->user()->is_admin;

        if ($isAdmin) {
            return view('admin', compact('movie'));
        }
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



        return redirect(to: 'usuario')->with('message', 'Filme atualizado com sucesso!');
    }

    public function rent_movie(Movie $movie)
    {
        $user = auth()->user();
        if (!$user) {
            return view('login');
        }
        try {
            $user->movies_renting()->attach($movie->id, ['created_at' => now(), 'updated_at' => now()]);
        } catch (UniqueConstraintViolationException $e) {
            return redirect()->back()->with('error', 'Você já está alugando esse filme.');
        }
        return redirect()->back()->with('success', 'Filme alugado com sucesso.');
    }

    public function return_movie(Movie $movie)
    {
        $user = auth()->user();
        if (!$user) {
            return view('login');
        }
        $detached = $user->movies_renting()->detach($movie->id);
        if (!$detached) {
            return redirect()->back()->with('error', 'Você não está alugando esse filme.');
        }
        $user->movies_previously_rented()->attach($movie->id, ['created_at' => now(), 'updated_at' => now()]);
        return redirect()->back()->with('success', 'Filme devolvido com sucesso.');
    }

}
