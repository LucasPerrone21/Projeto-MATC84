<div>
    <!-- Essa view exibe o formulário de recuperação de senha -->
    <!-- Caso $email for null, só exibe o formulário -->
    <!-- Caso o $error for null, exibe também o $status (sucesso) -->
    <!-- Caso $error não for null, exibir o erro e pre-preencher o campo
    do form com $email -->
    <p>Tela de esqueci a senha!</p>
    <p style="@if($error) display: block; @else display: none; @endif">
        {{ $error }}
    </p>
    <form action="{{ route('password.sendResetToken') }}" method='POST'>
        @csrf
        <label for="email">Digite o email:</label>
        <input type="email" id="email" name="email" value="{{ $email }}">
        <button type="submit">Recuperar</button>
</div>
