<div>
    <!-- Essa view recebe o argumento $token e um query param email -->
    <!-- Essa view deve conter um form contendo os campos password e password_confirmation,
    além de um campo hidden contendo $token -->
    <!-- O form deve ser enviado para a rota password.reset -->
    <!-- O form deve conter o token csrf -->
    <!-- O form deve conter um botão de submit -->
    <p>Tela de reset de senha!</p>
    <p> {{ $errors }}</p>
    <form action="{{ route('password.update') }}" method='POST'>
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $_GET['email'] }}">
        <label for="password">Digite a nova senha:</label>
        <input type="password" id="password" name="password">
        <label for="password_confirmation">Confirme a nova senha:</label>
        <input type="password" id="password_confirmation" name="password_confirmation">
        <button type="submit">Resetar</button>
</div>
