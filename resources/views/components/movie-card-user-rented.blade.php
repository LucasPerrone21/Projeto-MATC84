<div class="card rounded" style="width: 24rem;">
    <?php
header("Content-type: " . $movie->image_type);
echo '<img src="data:' . $movie->image_type . ';base64,' . base64_encode($movie->image) . '" class="card-img-top" alt="Imagem da Capa do filme">'
  ?>

    <div class="card-body">
        <h5 class="card-title">{{ $movie->title }}</h5>

        <h6 class="card-subtitle mb-2 text-muted">{{ $movie->gender_movie }}</h6>

        <p class="card-text">
            {{ $movie->description }}
        </p>

        <div class="d-flex gap-3">
            <button type="button" class="btn btn-danger border-0" data-toggle="modal"
                data-target="#DeleteConfirmModal{{$movie->id}}"> Devolver </button>
        </div>
    </div>
</div>

<div class="modal fade" id="DeleteConfirmModal{{$movie->id}}" tabindex="-1" role="dialog"
    aria-labelledby="DeleteConfirmModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteConfirmModalTitle"> Devolver filme </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja devolver este filme?
            </div>
            <form action="{{ url('/devolver-filme', $movie) }}" method="post">
                <!-- radio to rate the movie from 1 to 5, displayed horizontally, with 5px between the radios  -->
                <label for="rating" class="modal-body">Selecione a nota que deseja atribuir a ele:</label>
                <div class="form-check
                    @error('rating') is-invalid @enderror" style="display: flex; gap: 10px;">
                    <input class="form-check
                        @error('rating') is-invalid @enderror" type="radio" name="rating" value="1" required> 1
                    <input class="form-check
                        @error('rating') is-invalid @enderror" type="radio" name="rating" value="2" required> 2
                    <input class="form-check
                        @error('rating') is-invalid @enderror" type="radio" name="rating" value="3" required> 3
                    <input class="form-check
                        @error('rating') is-invalid @enderror" type="radio" name="rating" value="4" required> 4
                    <input class="form-check
                        @error('rating') is-invalid @enderror" type="radio" name="rating" value="5" required> 5
                    @error('rating')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    @csrf
                    <button type="submit" class="btn btn-danger">Devolver</button>
                </div>
            </form>
        </div>
    </div>
</div>