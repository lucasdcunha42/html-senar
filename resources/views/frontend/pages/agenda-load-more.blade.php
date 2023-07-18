@foreach($agendas as $evento)
    <div
        class="col-sm-4 col-md-3 curso-item"
        data-regiao="{{ $cursos[1]->regiaoevento }}"
        data-modalidade="{{ $cursos[1]->modalidade }}">
        @include('components.c-thumb-4', ['evento' => $evento])
    </div>
@endforeach
