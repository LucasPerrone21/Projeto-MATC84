@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-column gap-5 px-4 px-lg-5 py-5" style="background: #1E1E1E">

        <h1 class="text-white">Cadastro de filmes</h1>

        <div class="d-flex gap-5 flex-wrap justify-content-center ">
            <x-movieCard
                image="assets/images/movie_cover_img.svg"
                title="Título do Filme 1"
                subtitle="Subtítulo do Filme 1"
                content="Algum texto rápido para construir o título do cartão e compor a maior parte do conteúdo do cartão."
            >
            </x-movieCard>

            <x-movieCard
                image="assets/images/movie_cover_img.svg"
                title="Título do Filme 2"
                subtitle="Subtítulo do Filme 2"
                content="'Algum texto rápido para construir o título do cartão e compor a maior parte do conteúdo do cartão.'"
            >
            </x-movieCard>

            <x-movieCard
                image="assets/images/movie_cover_img.svg"
                title="Título do Filme 3"
                subtitle="Subtítulo do Filme 3"
                content="Algum texto rápido para construir o título do cartão e compor a maior parte do conteúdo do cartão."
            >
            </x-movieCard>

            <x-movieCard
                image="assets/images/movie_cover_img.svg"
                title="Título do Filme 4"
                subtitle="Subtítulo do Filme 4"
                content="Algum texto rápido para construir o título do cartão e compor a maior parte do conteúdo do cartão."
            >
            </x-movieCard>

            <x-movieCard
                image="assets/images/movie_cover_img.svg"
                title="Título do Filme 5"
                subtitle="Subtítulo do Filme 5"
                content="Algum texto rápido para construir o título do cartão e compor a maior parte do conteúdo do cartão."
            >
            </x-movieCard>

            <x-movieCard
                image="assets/images/movie_cover_img.svg"
                title="Título do Filme 6"
                subtitle="Subtítulo do Filme 6"
                content="Algum texto rápido para construir o título do cartão e compor a maior parte do conteúdo do cartão."
            >
            </x-movieCard>
        </div>
    </div>
@endsection
