@extends('layouts.authentication')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 70vh; gap: 32px">
    <div class="text-center" style="width: 360px">
        <h1 style="color: #FFFFFF; font-size: 32px; font-family: 'Inter', sans-serif; font-weight: 400">Entre na sua conta</h1>
        <p style="color: #FFFFFF; font-size: 16px; font-family: 'Inter', sans-serif; font-weight: 200">Bem-vindo de volta!</p>
    </div>
    <div class="col-md-6 register d-flex justify-content-center ">
        <form action="/login" method='POST' style="width: 360px">
        @csrf
            <div class="form-group">
                <div class="mb-2">
                    <label class="text-white" for="email">Email</label>
                </div>
                <div class="mb-2">
                    <input type="email" id="email" name="email" placeholder="Insira seu email" style="width: 360px" required>
                </div>
            </div>      
            <div class="form-group">
                <div class="mb-2">
                    <label class="text-white" for="password">Senha</label>
                </div>
                <div class="mb-2">
                    <input type="password" id="password" name="password" placeholder="Senha" style="width: 360px" required>
                </div>
            </div>
            <div style="margin-bottom: 10px">
                <a href="/forgot-password">Esqueceu a senha?</a>
            </div>
            <button type="submit" class="btn btn-primary" style="background: #4248F2; width: 360px; height: 38px">ENTRAR</button>
        </form>
    </div>
    <div>
        <p style="color: #FFFFFF">Não tem uma conta? <a href="/cadastro">Cadastre-se</a></p>
    </div>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

@endsection