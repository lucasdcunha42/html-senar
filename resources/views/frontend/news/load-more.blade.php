@foreach($noticias->chunk(3) as $row)
    <div class="row">
        @foreach($row as $noticia)
            <div class="col-sm-4">
                @include('components.c-thumb-2', ['noticia' => $noticia])
            </div>
        @endforeach
    </div>
@endforeach
