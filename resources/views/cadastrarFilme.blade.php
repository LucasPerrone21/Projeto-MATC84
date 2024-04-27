@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex flex-column gap-5 px-4 px-lg-5 py-5" style="background: #1E1E1E">
    <div class="d-flex gap-2 align-items-center">
        <img src="assets/images/ph_pencil-circle-light.svg" alt="Ícone de lápis">
        <h1 class="text-white m-0">Cadastro de filmes</h1>
    </div>

    <div class="row d-flex flex-column flex-lg-row gap-5 gap-lg-0">
        <div class="col-12 col-lg-8">
            <form class="row g-3">
                <div class="col-md-6">
                  <label for="inputEmail4" class="form-label" style="color: #fff;">Título</label>
                  <input type="email" class="form-control" id="inputEmail4" placeholder="Digite o título do filme">
                </div>

                <div class="col-md-6">
                    <label for="inputState" class="form-label" style="color: #fff;">Gênero</label>
                    <select id="inputState" class="form-select">
                      <option selected>Escolha...</option>
                      <option>...</option>
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
                  <button type="submit" class="btn btn-primary">Cadastrar filme</button>
                  <button type="submit" class="btn btn-danger">Cancelar</button>
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
</script>

@endsection
