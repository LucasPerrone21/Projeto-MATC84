@extends('layouts.appUser')

@section('content')
    <div class="container-fluid d-flex flex-column gap-5 px-4 px-lg-5 py-5" style="background: #1E1E1E">

        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center gap-4 gap-lg-0">
            <div class="d-flex gap-2 align-items-center" id="catalago">
                <img src="assets/images/icon-park-outline_movie.svg" alt="Ícone de filme">
                <h1 class="text-white m-0">Catálogo de filmes</h1>
            </div>
        </div>

        <div class="d-flex gap-5 flex-wrap justify-content-center">
            <x-movieCardUser
                image="assets/images/movie_cover_img.svg"
                title="Título do Filme 1"
                subtitle="Subtítulo do Filme 1"
                content="Algum texto rápido para construir o título do cartão e compor a maior parte do conteúdo do cartão."
            />

            <x-movieCardUser
                image="assets/images/movie_cover_img.svg"
                title="Título do Filme 2"
                subtitle="Subtítulo do Filme 2"
                content="'Algum texto rápido para construir o título do cartão e compor a maior parte do conteúdo do cartão.'"
            />

            <x-movieCardUser
                image="assets/images/movie_cover_img.svg"
                title="Título do Filme 3"
                subtitle="Subtítulo do Filme 3"
                content="Algum texto rápido para construir o título do cartão e compor a maior parte do conteúdo do cartão."
            />

            <x-movieCardUser
                image="assets/images/movie_cover_img.svg"
                title="Título do Filme 4"
                subtitle="Subtítulo do Filme 4"
                content="Algum texto rápido para construir o título do cartão e compor a maior parte do conteúdo do cartão."
            />

            <x-movieCardUser
                image="assets/images/movie_cover_img.svg"
                title="Título do Filme 5"
                subtitle="Subtítulo do Filme 5"
                content="Algum texto rápido para construir o título do cartão e compor a maior parte do conteúdo do cartão."
            />

            <x-movieCardUser
                image="assets/images/movie_cover_img.svg"
                title="Título do Filme 6"
                subtitle="Subtítulo do Filme 6"
                content="Algum texto rápido para construir o título do cartão e compor a maior parte do conteúdo do cartão."
            />
        </div>

        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center gap-4 gap-lg-0">
            <div class="d-flex gap-2 align-items-center" id="meusFilmes">
                <img src="assets/images/mdi_movie-open-star-outline.svg" alt="Ícone de Claquete">
                <h1 class="text-white m-0">Seus Filmes</h1>
            </div>
        </div>
        <div class="d-flex gap-5 flex-wrap justify-content-center">
            <x-movieCardUser
                image="assets/images/movie_cover_img.svg"
                title="Título do Filme 1"
                subtitle="Subtítulo do Filme 1"
                content="Algum texto rápido para construir o título do cartão e compor a maior parte do conteúdo do cartão."
            />

            <x-movieCardUser
                image="assets/images/movie_cover_img.svg"
                title="Título do Filme 2"
                subtitle="Subtítulo do Filme 2"
                content="'Algum texto rápido para construir o título do cartão e compor a maior parte do conteúdo do cartão.'"
            />

            <x-movieCardUser
                image="assets/images/movie_cover_img.svg"
                title="Título do Filme 3"
                subtitle="Subtítulo do Filme 3"
                content="Algum texto rápido para construir o título do cartão e compor a maior parte do conteúdo do cartão."
            />

            <x-movieCardUser
                image="assets/images/movie_cover_img.svg"
                title="Título do Filme 4"
                subtitle="Subtítulo do Filme 4"
                content="Algum texto rápido para construir o título do cartão e compor a maior parte do conteúdo do cartão."
            />

            <x-movieCardUser
                image="assets/images/movie_cover_img.svg"
                title="Título do Filme 5"
                subtitle="Subtítulo do Filme 5"
                content="Algum texto rápido para construir o título do cartão e compor a maior parte do conteúdo do cartão."
            />

            <x-movieCardUser
                image="assets/images/movie_cover_img.svg"
                title="Título do Filme 6"
                subtitle="Subtítulo do Filme 6"
                content="Algum texto rápido para construir o título do cartão e compor a maior parte do conteúdo do cartão."
            />
        </div>

    </div>
@endsection