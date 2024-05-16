@extends('layouts.authentication')
@section('title', 'Redefinir Senha')
@section('content')

<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 70vh; gap: 32px">
    <div class="text-center" style="width: 360px">
        <h1 style="color: #FFFFFF; font-size: 32px; font-family: 'Inter', sans-serif; font-weight: 400">Redefina sua senha</h1>
        <p style="color: #FFFFFF; font-size: 16px; font-family: 'Inter', sans-serif; font-weight: 200">Enviar o código para o email</p>
    </div>
    @if ($errors->any())
    <div>
        <ul  class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li>&#x2716; {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="col-md-6 register d-flex justify-content-center ">
        <form action="{{ route('password.sendResetToken') }}" method='POST' style="width: 360px">
        @csrf
            <div class="form-group">
                <div class="mb-2">
                    <label class="text-white" for="email">Email <span style="color: #DC3545">*</span></label>
                </div>
                <div class="mb-2">
                    <input type="email" id="email" name="email" placeholder="Insira seu email" style="width: 360px" required>
                </div>
            </div>      
                <button type="submit" class="btn btn-primary" style="background: #4248F2; width: 360px; height: 38px">ENVIAR CÓDIGO</button>
        </form>
    </div>
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#" data-bs-slide-to="1" aria-label="Slide 2"></button>

      </div>

</div>

@endsection

