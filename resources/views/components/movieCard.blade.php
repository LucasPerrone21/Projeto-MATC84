<div class="card rounded" style="width: 24rem;">
    <img src="{{ $image }}" class="card-img-top" alt="Imagem da Capa do filme">

    <div class="card-body">
      <h5 class="card-title">{{ $title }}</h5>

      <h6 class="card-subtitle mb-2 text-muted">{{ $subtitle }}</h6>

      <p class="card-text">
        {{ $content }}
      </p>

      <div class="d-flex gap-3">
          <a href="#" class="btn btn-primary">Editar</a>
          <a href="#" class="btn btn-danger">Excluir</a>
      </div>
    </div>
</div>


