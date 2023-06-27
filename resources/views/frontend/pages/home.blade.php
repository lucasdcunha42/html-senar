@extends('templates.master')

@section('content')

    @include('components.banner-carousel')

    @if($programas->isNotEmpty())
        <div class="home-section programas-capacitacao">

            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="page-title center">
                            Principais Programas de Capacitação
                        </h3>
                    </div>
                </div>

                @foreach($programas->chunk(3) as $row)
                    <div class="row">
                        @foreach($row as $key => $programa)
                            <div class="col-sm-4">
                                @include('components.c-thumb-1', ['programa' => $programa])
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div class="see-more">
                <a href="{{ route('page.programas') }}">Ver mais</a>
            </div>

        </div>
    @endif

    @if($noticias->isNotEmpty())
        <div class="home-section news bg-grey">

            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="page-title center">
                            Notícias
                        </h3>
                    </div>
                </div>
                @foreach ($noticias->chunk(3) as $row)
                    <div class="row">
                       @foreach ($row as $noticia)
                        <div class="col-sm-4">
                            @include('components.c-thumb-2', ['noticia' => $noticia])
                        </div>
                       @endforeach
                    </div>
                @endforeach

            </div>

            <div class="see-more">
                <a href="{{ route('page.news.index') }}">Ver mais</a>
            </div>

        </div>
    @endif

    @if($destaques->isNotEmpty())
        <div class="home-section destaques">

            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="page-title center">
                            Destaques
                        </h3>
                    </div>
                </div>
                @foreach ($destaques->chunk(2) as $row)
                    <div class="row">
                        @foreach ($row as $destaque)
                            <div class="col-sm-6">
                                <div class="c-thumb-3">
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-4">
                                            <div class="c-thumb-3__header">
                                                <a href="{{ $destaque->link }}"><img class="img-responsive" src="{{ urlStorage($destaque->imagem, 150, 150, 'fit') }}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="c-thumb-3__body">
                                                <h5><a href="{{ $destaque->link }}">{{ $destaque->titulo }}</a></h5>
                                                <p><a href="{{ $destaque->link }}">{{ $destaque->subtitulo }}</a></p>
                                                @if(!empty(trim($destaque->info)))
                                                    <p class="date"><a href="{{ $destaque->link }}">{{ $destaque->info }}</a></p>
                                                @endif
                                                <div>
                                                    <a href="{{ $destaque->link }}"><img src="{{ asset('images/arrow.png') }}" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <br><br>
            {{-- <div class="see-more">
                <a href="#">Ver mais</a>
            </div> --}}

        </div>
    @endif

    @include('frontend.partials.agenda')

@endsection
