<div class="card rounded" style="width: 24rem;">

<?php 
  header("Content-type: ".$movie->image_type);
  echo '<img src="data:'.$movie->image_type.';base64,'.base64_encode($movie->image) .'" class="card-img-top" alt="Imagem da Capa do filme">'
?>
    

    <div class="card-body">
      <h5 class="card-title">{{ $movie->title }}</h5>

      <h6 class="card-subtitle mb-2 text-muted">{{ $movie->gender_movie }}</h6>

      <p class="card-text">
        {{ $movie->description }}
      </p>

      <div class="d-flex gap-3">
          <a href="{{ route('edit.movie', ['id' => $movie->id]) }}" class="btn btn-primary">Editar</a>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
            Excluir
          </button>
      </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Excluir Filme</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> Tem certeza que deseja excluir? </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form action="{{url("/excluir-filmes/$movie->id")}}"  method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Excluir</button>
      </form>
      </div>
    </div>
  </div>
</div>


