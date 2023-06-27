@extends('templates.master')

@section('css-vendor')
    <link rel="stylesheet" href="{{ asset('js/vendor/lightcase-2.5.0/src/css/lightcase.css') }}">
@endsection

@section('js-vendor')
    <script src="{{ asset('js/vendor/lightcase-2.5.0/src/js/lightcase.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.event.touch.js') }}"></script>
@endsection

@section('content')

    @php
        $pageVars = [];

        if($programa && !empty(trim($programa->imagem))) {
            $pageVars['bgPagePath'] = urlStorage($programa->imagem, 1400, 300);
        }
    @endphp

    @include('components.banner-page', $pageVars)

    <div class="programas-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="page-title center">
                        {{ $programa->titulo }}
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="programa-description html">
                        {!! $programa->texto !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="como-participar programas">
        <div class="container">
            <div class="row">
                @if($comoParticipar)
                    <div class="col-sm-5">
                        <h6>{{ $comoParticipar->titulo }}</h6>
                        {!! $comoParticipar->conteudo !!}
                        <br>

                        @php
                            $link = $comoParticipar->getLink();
                        @endphp

                        @if(!empty($link))
                            <a href="{{ url($link->url_path) }}" class="internal-link">
                                {{ $link->text }}
                            </a>
                        @endif

                    </div>
                @endif
                <div class="col-sm-1"></div>
                <div class="col-sm-6">
                    <div class="course-requires">
                        <div class="required-item">
                            <img src="{{ asset('images/icons/target.png') }}" alt="">
                            <span class="fw-bold">Público-alvo:</span> <span>{{ strip_tags($programa->publico_alvo) }}</span>
                        </div>
                        <div class="required-item">
                            <img src="{{ asset('images/icons/devices.png') }}" alt="">
                            <span class="fw-bold">Pré-requisitos:</span> <span>{{ strip_tags($programa->pre_requisitos) }}</span>
                        </div>
                        <div class="required-item">
                            <img src="{{ asset('images/icons/upr.png') }}" alt="">
                            <span class="fw-bold">Número de participantes por grupo:</span> <span>{{ strip_tags($programa->qty_participantes_grupo) }}</span>
                        </div>
                        <div class="required-item">
                            <img src="{{ asset('images/icons/clock.png') }}" alt="">
                            <span class="fw-bold">Carga horária:</span> <span>{{ strip_tags($programa->carga_horario) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(trim($programa->conteudo_pragmatico) != '')
    <div class="conteudo-programatico programa-single">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h5 class="page-subtitle">Conteúdo Programático</h5>
                </div>
                <div class="col-xs-12">
                    <div class="auto-width html">
                        {!! $programa->conteudo_pragmatico !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(trim($programa->assistencia_tecnica) != '')
    <div class="assistencia-tecnica bg-green-lighter">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h5 class="page-subtitle">Assistência Técnica</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="container-small html">
                        {!! $programa->assistencia_tecnica !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(!empty($galeria))
        <div class="galeria-de-images bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h5 class="page-subtitle">Galeria de Fotos</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="galeria-imagem-itens text-center">
                            @foreach($galeria as $img)
                                <a
                                    href="{{ asset('storage/' . $img) }}"
                                    data-rel="lightcase:galeriaProgramas">
                                    <img src="{{ urlStorage($img, 100, 100, 'fit') }}" alt="">
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
