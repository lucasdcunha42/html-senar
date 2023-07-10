@foreach($cursos as $curso)
    <div
        class="col-sm-3"
        data-area-interesse="{{ $curso->areadeinteresse }}"
        data-regiao="{{ $curso->regiaoevento }}"
        data-ano-mes="{{ $curso->mes_ano }}"
        >
        <div class="curso-item" style="background-image: url({{ asset('storage/' . $curso->imagem) }})">
            <div class="curso-overlay"></div>
            <div class="d-table">
                <div class="d-table-cell v-center h-center">
                    <h4><a href="{{ route('page.cursos.single', $curso->slug) }}">{{ $curso->titulo  ?? $curso->nome_curso }}</a></h4>
                    <span class="curso-duration">Duração: {{ $curso->cargahorariatotal }}<span>h</span></span>
                </div>
            </div>
        </div>
    </div>
@endforeach
