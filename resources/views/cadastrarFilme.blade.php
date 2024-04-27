@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex flex-column gap-5 px-4 px-lg-5 py-5" style="background: #1E1E1E">
    <div class="d-flex gap-2 align-items-center">
        <img src="assets/images/ph_pencil-circle-light.svg" alt="Ícone de lápis">
        <h1 class="text-white m-0">Cadastro de filmes</h1>
    </div>

    {{-- Por padrão esses alerts estão com display: none --}}
    <div class="alert alert-success d-none" role="alert" id="successAlert">
        Filme cadastrado com sucesso!
    </div>

    <div id="alertContainer" class="d-none">
        <div class="alert alert-danger alert-dismissible d-none" role="alert" id="errorAlert">
            Por favor, preencha todos os campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    {{-- Por padrão esses alerts estão com display: none --}}

    <div class="row d-flex flex-column flex-lg-row gap-5 gap-lg-0">
        <div class="col-12 col-lg-8">
            <form class="row g-3" id="movieForm" onsubmit="event.preventDefault();">
                <div class="col-md-6">
                  <label for="inputEmail4" class="form-label" style="color: #fff;">Título</label>
                  <input type="text" class="form-control" id="inputEmail4" placeholder="Digite o título do filme">
                </div>

                <div class="col-md-6">
                    <label for="inputState" class="form-label" style="color: #fff;">Gênero</label>
                    <select id="inputState" class="form-select">
                      <option selected>Escolha...</option>
                      <option>Ação</option>
                      <option>Aventura</option>
                      <option>Comédia</option>
                      <option>Comédia romântica</option>
                      <option>Documentário</option>
                      <option>Drama</option>
                      <option>Espionagem</option>
                      <option>Faroeste</option>
                      <option>Fantasia</option>
                      <option>Ficção científica</option>
                      <option>Mistério</option>
                      <option>Musical</option>
                      <option>Policial</option>
                      <option>Romance</option>
                      <option>Terror</option>
                    </select>
                </div>

                <div>
                    <label for="exampleFormControlTextarea1" class="form-label" style="color: #fff;">Descrição</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Digite a descrição do filme"></textarea>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label" style="color: #fff;">Imagem de capa do filme</label>
                    <input class="form-control" type="file" id="formFile" onchange="loadFile(event)">
                </div>

                <div class="col-12 d-flex gap-4">
                  <button type="submit" class="btn btn-primary" onclick="submitForm()">Cadastrar filme</button>
                  <button type="submit" class="btn btn-danger" onclick="resetForm()">Limpar formulário</button>
                </div>
            </form>
        </div>

        <div class="col-12 col-lg-4">
            <img src="assets/images/preview_img.svg" id="movieImage" class="img-fluid" style="height: auto; width: 100%;" alt="imagem do filme">
        </div>
    </div>
</div>

<script>
    var loadFile = function(event) {
      var image = document.getElementById('movieImage');
      image.src = URL.createObjectURL(event.target.files[0]);
    };

    var resetForm = function() {
      document.getElementById('movieForm').reset();
      document.getElementById('movieImage').src = 'assets/images/preview_img.svg';
    };

    var submitForm = function() {
      var form = document.getElementById('movieForm');
      var inputs = form.getElementsByTagName('input');
      var select = form.getElementsByTagName('select');
      var textarea = form.getElementsByTagName('textarea');

      for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].value == '') {
          showAlert('Por favor, preencha todos os campos.', 'danger');
          return;
        }
      }

      for (var i = 0; i < select.length; i++) {
        if (select[i].value == '') {
          showAlert('Por favor, preencha todos os campos.', 'danger');
          return;
        }
      }

      for (var i = 0; i < textarea.length; i++) {
        if (textarea[i].value == '') {
          showAlert('Por favor, preencha todos os campos.', 'danger');
          return;
        }
      }

      showAlert('Filme cadastrado com sucesso!', 'success');
    };

    var showAlert = function(message, type) {
        var alertContainer = document.getElementById('alertContainer');
        alertContainer.classList.remove('d-none');
        alertContainer.innerHTML = `
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
    };

    document.getElementById('errorAlert').addEventListener('closed.bs.alert', function () {
        document.getElementById('alertContainer').classList.add('d-none');
    });
</script>

@endsection
