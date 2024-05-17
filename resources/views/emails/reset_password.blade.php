@component('mail::message')
<div style="text-align: center;">
    <img src="{{ asset('assets/images/movie_club_logo.svg') }}" style="max-width: 50%; height: auto;" alt="Logo do Movie Club">
</div>

# Redefinição de Senha

Olá,

Você está recebendo este email porque recebemos um pedido de redefinição de senha para a sua conta do The Movie Club.

@component('mail::button', ['url' => $url])
Redefinir Senha
@endcomponent

Se você não solicitou uma redefinição de senha, ignore este email.
@endcomponent