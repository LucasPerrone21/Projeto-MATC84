<div class="card rounded" style="width: 24rem;">
    <?php
header("Content-type: " . $movie->image_type);
echo '<img src="data:' . $movie->image_type . ';base64,' . base64_encode($movie->image) . '" class="card-img-top" alt="Imagem da Capa do filme">'
  ?>

    <form class="card-body" method='POST' action="{{url("alugar-filme/$movie->id")}}">
        @csrf
        @method('POST')
        <h5 class="card-title">{{ $movie->title }}</h5>

        <h6 class="card-subtitle mb-2 text-muted">{{ $movie->gender_movie }}</h6>

        <p class="card-text">
            {{ $movie->description }}
        </p>

        <div class="d-flex gap-3">
            <button class="btn btn-primary" style="background: #4248F2 !important">Alugar</button>
        </div>
    </form>
</div>