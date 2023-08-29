@foreach($agendas as $evento)
    <div
        class="col-sm-4 col-md-3"
        data-regiao="{{ $evento->regiaoevento }}"
        data-modalidade="{{ $evento->curso->modalidade }}">
        @include('components.c-thumb-4', ['evento' => $evento])
    </div>
@endforeach
