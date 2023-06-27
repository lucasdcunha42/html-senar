@foreach($cursos as $evento)
    <div
        class="col-sm-4 col-md-3 curso-item"
        data-regiao="{{ $evento->regiaoevento }}"
        data-modalidade="{{ $evento->modalidade }}">
        @include('components.c-thumb-4', ['evento' => $evento])
    </div>
@endforeach
