<form action="/cadastro" method='POST'>
@csrf
    <label for="email">Digite o email:</label>
    <input type="email" id="email" name="email">
    <label for="password">Digite a senha:</label>
    <input type="password" id="password" name="password">
    <label for="name">Digite o nome:</label>
    <input type="text" id="name" name="name">
    <button type="submit">Registrar</button>
</form>
<a href="{{ route('password.forgot') }}">Esqueci a senha</a>

@if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
