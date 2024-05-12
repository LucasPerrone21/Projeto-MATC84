@extends('layouts.appUser')

@section('content')

<div class="container-fluid d-flex flex-column gap-5 px-4 px-lg-5 py-5" style="background: #1E1E1E">
    <div class="d-flex gap-2 align-items-center">
        <img src="{{ asset('assets/images/person-fill.svg') }}" alt="Ícone de lápis">
        <h1 class="text-white m-0">Meu perfil</h1>
    </div>

    <div class="d-flex gap-5 flex-wrap justify-content-start"> 
        <div>
            <h3 class="text-white m-0" style="font-size: 28px; font-weight: 600;">Nome</h3>
            <h4 class="text-white m-0" style="font-size: 20px; font-weight: 300;">{{ $userName }}</h4>
        </div>
    </div>
    <div class="d-flex gap-5 flex-wrap justify-content-start"> 
        <div>
            <h3 class="text-white m-0" style="font-size: 28px; font-weight: 600;">E-mail</h3>
            <h4 class="text-white m-0" style="font-size: 20px; font-weight: 300;">{{ $userEmail }}</h4>
        </div>
    </div>

</div>

@endsection
