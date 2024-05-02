@extends('layouts.authentication')

@section('content')



    <div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">

            
            <div class="col-md-6">
                
                <form action="/cadastroUser" method='POST'>
                @csrf

                    <div class="form-group">
                        <div class="form-group">
                            <div class="mb-2">
                                <label class="text-white" for="name">Nome</label>
                            </div>
                            <div class="mb-2">
                                <input type="text" id="name" name="name" placeholder="Insira seu nome">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="text-white" for="email">Email</label>
                        </div>
                        <div class="mb-2">
                            <input type="email" id="email" name="email" placeholder="Insira seu email">
                        </div>
                    </div>        
                    <div class="form-group">
                        <div class="mb-2">
                            <label class="text-white" for="password">Senha</label>
                        </div>
                        <div class="mb-2">
                            <input type="password" id="password" name="password" placeholder="Senha">
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
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