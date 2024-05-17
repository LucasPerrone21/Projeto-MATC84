@extends('layouts.authentication')
@section('title', 'Redefinir Senha')
@section('content')

<div>
    <!-- Essa view recebe o argumento $token e um query param email -->
    <!-- Essa view deve conter um form contendo os campos password e password_confirmation,
    além de um campo hidden contendo $token -->
    <!-- O form deve ser enviado para a rota password.reset -->
    <!-- O form deve conter o token csrf -->
    <!-- O form deve conter um botão de submit -->

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
        <form action="{{ route('password.reset') }}" method='POST' style="width: 360px">
            @csrf
            <div class="form-group">
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $_GET['email'] }}">
                <div class="mb-2">
                    <label for="password">Senha<span style="color: #DC3545">*</span></label>
                </div>
                <div class="mb-2">
                    <input type="password" id="password" name="password" placeholder="Insira a sua nova senha">
                </div>
                <div class="mb-2">
                    <label for="password_confirmation">Confirmar senha <span style="color: #DC3545">*</span></label>
                </div>
                <div class="mb-2">
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirme a sua nova senha">
                </div>
            </div>
            <button type="submit">ENVIAR SENHA</button>
        </form>
        <div class="d-flex justify-content-center align-items-center mt-3 w-100">
            <div class="d-flex justify-content-between align-items-center" style="width: 360px;">
                <i class="bi bi-chevron-compact-left fs-2 text-white" style="margin-right: 4.5em;"></i>
                <div class="carousel-indicators" style="margin-bottom: 7em;">
                    <button type="button" data-bs-target="#" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
                <i class="bi bi-chevron-compact-right fs-2 text-white" style="margin-left: 4em;"></i>
            </div>
        </div>
</div>
