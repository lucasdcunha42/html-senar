<div class="c-thumb-4">
    <div class="c-thumb-4__date">
        <span>{{ $evento->getAttrDateFromFormat('data_inicio', 'Y-m-d', 'd.m.Y') }}</span>
    </div>
    <div class="c-thummb-4__title">
        <div class="d-table">
            <div class="d-table-cell v-center h-center">

                <h4>{{ $evento->nome_curso }}</h4>
            </div>
        </div>
    </div>
    <div class="c-thummb-4__city">
        <p>{{ $evento->cidade }}</p>
    </div>
    <div class="c-thumb-4__link">
        <a href="{{ route('page.cursos.single', $evento->slug) }}">Ler mais</a>
    </div>
    {{-- --}}
    @if($evento->desc_fase_evento == 'Cancelado')
        <div class="curso-cancelado">
            Cancelado
        </div>
    @endif
</div>
