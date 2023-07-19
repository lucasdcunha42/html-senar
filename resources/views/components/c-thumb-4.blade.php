<div class="c-thumb-4">
    <div class="c-thumb-4__date">
        <span>{{ $evento->curso->getAttrDateFromFormat('data_inicio', 'Y-m-d', 'd.m.Y') }}</span>
    </div>
    <div class="c-thummb-4__title">
        <div class="d-table">
            <div class="d-table-cell v-center h-center">
                <h4>{{ $evento->curso->nome_curso }}</h4>
            </div>
        </div>
    </div>
    <div class="c-thummb-4__city">
        <p>{{ $evento->curso->cidade }}</p>
    </div>
    <div class="c-thumb-4__link">
        <a href="{{ route('page.cursos.single', $evento->curso->slug) }}">Ler mais</a>
    </div>
    {{-- --}}
    @if($evento->curso->desc_fase_evento == 'Cancelado')
        <div class="curso-cancelado">
            Cancelado
        </div>
    @endif
</div>
