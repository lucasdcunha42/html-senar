@foreach ($agendas as $agenda)
    <div class="c-thumb-4 col-sm-3">
        <div class="c-thumb-4__date">
            <span>{{ $agenda->getAttrDateFromFormat('data_inicio', 'Y-m-d', 'd.m.Y') }}</span>
        </div>
        <div class="c-thummb-4__title">
            <div class="d-table">
                <div class="d-table-cell v-center h-center">

                    <h4>{{ $agenda->nome_curso }}</h4>
                </div>
            </div>
        </div>
        <div class="c-thummb-4__city">
            <p>{{ $agenda->nome_municipio }}</p>
        </div>
        <div class="c-thumb-4__link">
            <a href="{{ route('page.agendas.single', $agenda->slug) }}">Ler mais</a>
        </div>
        {{-- --}}
        @if($agenda->desc_fase_evento == 'Cancelado')
            <div class="curso-cancelado">
                Cancelado
            </div>
        @endif
    </div>
@endforeach
