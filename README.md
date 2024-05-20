# The Movie Club
<div>
    <img src='https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white'>
    <img src='https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white'>
    <img src='https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white'>
    <img src='https://img.shields.io/badge/HTML-239120?style=for-the-badge&logo=html5&logoColor=white'>
    <img src='https://img.shields.io/badge/CSS-FF9633?&style=for-the-badge&logo=css3&logoColor=white'>
    <img src='https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white'>
</div>
<br>

![image](https://github.com/LucasPerrone21/Projeto-MATC84/assets/84514426/939a9daa-825a-4cdd-8225-78439399ce1f)


Integrantes:

1. Helen Amanda Lima de Freitas
2. Letícia Santos Teixeira
3. Lucas de Araújo Santos Oliveira
4. Lucas Perrone Ramos
5. Luiz Cláudio Dantas Cavalcanti
6. Maria Fernanda Pinto da Fonseca
7. Mário Sérgio Brito Pires Santos
8. Vitor Hugo Barbosa dos Santos

## 1. Instruções de instalação e execução

Estas instruções irão guiá-lo na configuração e execução do projeto The Movie Club em sua máquina local para fins de desenvolvimento e testes.

### Pré-requisitos:

Certifique-se de ter os seguintes softwares instalados:

- [PHP](https://www.php.net/) >= 7.3
- [Composer](https://getcomposer.org/)
- [Laravel](https://laravel.com/) >= 10.x
- [MySQL](https://www.mysql.com/) ou outro banco de dados compatível

### Passo a Passo:

#### 1. Clone o Repositório

Clone o repositório do projeto para sua máquina local usando o comando:

```sh
git clone https://github.com/LucasPerrone21/Projeto-MATC84.git
```
ou

```
git clone git@github.com:LucasPerrone21/Projeto-MATC84.git
```

#### 2. Navegue até o diretório padrão

```
cd Projeto-MATC84
```

#### 3. Instale as dependências do PHP

```
composer install
```

#### 3. Configure o arquivo ".env"

```
cp .env.example .env
```

Depois abra o arquivo criado e configure com seu banco de dados (MySQL de preferência) e seu servidor SMTP

#### 4. Execute as migrações

```
php artisan migrate
```

#### 5. Inicie o servidor de desenvolvimento

```
php artisan serve
```

## 2. Funcionalidades do sistema

### **Ações comuns a todos os usuários**

1. Login

> O acesso ao sistema é feito a partir do fornecimento do e-mail e senha, previamente cadastrados, na tela inicial da aplicação.

2. Recuperação de senha

> Ao acessar o link "Esqueceu a senha?" na página inicial, o usuário poderá redefinir sua senha. Basta fornecer o e-mail associado à conta e clicar no botão "Enviar código". Um código de verificação será enviado para o e-mail fornecido, permitindo a confirmação da identidade e a criação de uma nova senha.

3. Edição de conta

> Após o usuário ser devidamente cadastrado e logado no sistema, será possível ele mudar suas informações como nome e e-mail, clicando no seu nome previamente cadastrado que aparece na header da aplicação.

4. Deleção de conta

> Após o usuário ser devidamente cadastrado e logado no sistema, será possível excluir permanentemente sua conta na tela de edição. Ao realizar essa ação, ele será redirecionado para a tela de login, onde poderá posteriormente realizar um novo cadastro.

5. Visualizar filmes cadastrados

> Na tela inicial, após a realização do login, será possível ao usuário visualizar todos os filmes cadastrados na aplicação e suas informações de capa, nome, gênero e sinopse.

### **Ações do usuário comum**

1. Cadastro de conta

> Após se cadastrar, o usuário terá acesso à plataforma. Para isso, basta clicar no link "Cadastre-se" disponível na página inicial. O processo é simples e requer apenas o fornecimento do nome, e-mail e uma senha, que será criptografada no banco de dados.

2. Alugar filme

> Após o usuário cadastrado e logado na aplicação, será exibido para ele os filmes cadastrados com um botão de alugar. Ao clicá-lo, o filme será associado ao usuário e aparecerá na sessão de “Filmes Alugados”.

3. Devolver filme

> Na página inicial do usuário será possível acessar a sessão de “Filmes Alugados”, onde aparecerão os filmes previamente locado pelo cliente, nele aparecerá as informações do filme e um botão de “Devolver”. Ao clicá-lo, o filme sairá da lista do usuário.

### **Ações do usuário administrador**

1. Cadastrar filmes

> Ao acessar a página inicial, o administrador poderá cadastrar um novo filme no sistema clicando no botão de “Adicionar Filme”. O usuário será redirecionado para uma página específica onde fornecerá o título, capa, descrição e selecionará o gênero do filme.

2. Editar filmes

> Ao acessar a página inicial, no card de cada filme previamente cadastrado, o administrador terá a opção de editar as informações de capa, título, descrição e gênero dos mesmos.

3. Remover filmes

> Ao acessar a página inicial, no card de cada filme previamente cadastrado, o administrador terá a opção de excluí-lo. Ao clicar no botão, será exibido um modal para a confirmação da ação selecionada.

## 3. Estrutura

**Explicação do código/fluxo de criação de filme:** [PHP/LARAVEL | Fluxo de criação de filme](https://youtu.be/6AwAuDcuwJc?si=WWS-dqG2ee7-0tzr)

A aplicação foi desenvolvida utilizando o padrão MVC (Model-View-Controller), adotado pelo Laravel. A estrutura do projeto, pela ótica do MVC, é organizada da seguinte forma:

### Models

1. **User**

Representa um usuário, suas credenciais e informações pessoais.

Atributos:

-   name: nome do usuário.
-   email: e-mail do usuário.
-   password: senha do usuário (criptografada).
-   remember_token: token de autenticação.
-   is_admin: flag que indica se o usuário é do tipo administrador.
-   email_verified_at: data de verificação do e-mail, null enquanto não verificado.
-   movies_renting: relação que lista os filmes que o usuário está alugando no momento.
-   movies_previously_rented: relação que lista os filmes alugados no passado e já devolvidos pelo usuário.

2. **Movie**

Representa um filme e suas informações.

Atributos:

-   title: título do filme.
-   gender_movie: gênero do filme (ação, comédia, drama, etc.).
-   description: sinopse do filme.
-   image: imagem de capa do filme (em bytes).
-   image_type: formato de arquivo da imagem.
-   users_renting: relação que lista os usuários que estão alugando o filme.

### Views

1. **CreateMovie**

Formulário de cadastro de filmes.

![CreateMovie](/docs/imgs/CreateMovie.png)

2. **EditMovie**

Formulário de edição de filmes.

![EditMovie](/docs/imgs/EditMovie.png)

3. **User**

Catálogo de filmes do usuário comum.

![User](/docs/imgs/User.png)

4. **Admin**

Catálogo de filmes do administrador.

![Admin](/docs/imgs/Admin.png)

5. **ProfileAdm**

Edição de perfil do administrador.

![ProfileAdm](/docs/imgs/ProfileAdm.png)

6. **ProfileUser**

Edição de perfil do usuário comum.

![ProfileUser](/docs/imgs/ProfileUser.png)

7. **Login**

Formulário de login.

![Login](/docs/imgs/Login.png)

8. **Register**

Formulário de cadastro de usuários.

![Register](/docs/imgs/Register.png)

9. **password.Forgot**

Formulário de recuperação de senha (envio de código de verificação).

![password.Forgot](/docs/imgs/password.Forgot.png)

10. **password.Reset**

Formulário de redefinição de senha (atribuição de nova senha).

![password.Reset](/docs/imgs/password.Reset.png)

### Controllers

1. **LoginController**

Responsável pela autenticação do usuário. Lida com as requisições de login, logout e recuperação de senha.

2. **RegisterController**

Responsável pelo cadastro de usuários. Lida com as requisições de cadastro e exclusão de conta.

Realiza a validação dos dados fornecidos pelo usuário, criptografa a senha e salva o usuário no banco de dados.

3. **MovieController**

Responsável pela manipulação dos filmes. Lida com as requisições de:

-   Listagem de filmes.
-   Cadastro, edição e remoção de filmes (por administradores).
-   Aluguel e devolução de filmes (por usuários comuns).

4. **UserController**

Responsável pelo perfil dos usuários. Lida com as requisições de edição de dados do usuário.
