@foreach($cursos as $curso)
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" data-area-interesse="{{ $curso->areadeinteresse }}">
        <div class="curso-item" style="background-image: url({{ asset('storage/' . $curso->imagem) }})">
            <div class="curso-overlay"></div>
            <div class="d-table">
                <div class="d-table-cell v-center h-center">
                    <h4><a href="{{ route('page.cursos.single', $curso->slug) }}">{{ $curso->nome_curso }}</a></h4>
                </div>
            </div>
        </div>
    </div>
@endforeach
<div class="col-sm-12 text-center">
    {{ $cursos->links('templates.pagination') }}
</div>

