<div class="c-thumb-2" style="background-image: url({{  \Voyager::image($noticia->imagem) }})">
    <div class="c-thumb-2__overlay"></div>
    <div class="c-thumb-2__header">
        <span>{{ $noticia->created_at->format('d.m.Y') }}</span>
    </div>
    <div class="c-thumb-2__body">
        {{-- <a href="{{ route('page.news.single', optional($noticia->category)->slug ?? 'sem-titulo') }}"> --}}
            <span>
                {{ optional($noticia->category)->titulo ?? 'Sem título' }}
            </span>
        {{-- </a> --}}
        <div class="c-thumb-2__link">
            <a href="{{ route('page.news.single', $noticia->slug ?? 'sem-titulo') }}">
                {!! $noticia->titulo !!}</a>
        </div>
    </div>
    <div class="hide">
        {{ $noticia }}
    </div>
</div>
