@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-column gap-5 px-4 px-lg-5 py-5" style="background: #1E1E1E">

        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center gap-4 gap-lg-0">
            <div class="d-flex gap-2 align-items-center">
                <img src="assets/images/icon-park-outline_movie.svg" alt="Ícone de filme">
                <h1 class="text-white m-0">Catálogo de filmes</h1>
            </div>

        @if(session('message'))
        <div class="alert alert-success d-none" role="alert" id="successAlert">
                <p>{{session('message')}}</p>
            </div>
        @endif

            <a href="/cadastrar-filme" class="btn btn-primary" style="background: #4248F2 !important">Adicionar Filme +</a>
        </div>

        <div class="d-flex gap-5 flex-wrap justify-content-center">
            @foreach($movie as $movies)

                <x-movieCard :movie="$movies"/>
                
            @endforeach
            

            
        </div>
    </div>
@endsection
