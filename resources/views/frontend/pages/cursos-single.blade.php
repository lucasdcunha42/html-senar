@extends('templates.master')

@section('content')
    @include('components.banner-page', [
        'title' => $curso->nome_curso,
        'title' => $curso->nome_curso,
        'duration' => $curso->cargahorariatotal,
        'bgPagePath' => !empty(trim($curso->imagem)) ? urlStorage($curso->imagem, 1400, 300) : '',
        'bgPagePath' => !empty(trim($curso->imagem)) ? urlStorage($curso->imagem, 1400, 300) : '',
        'overlay' => false
    ])

    <div class="como-participar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>COMO <br> PARTICIPAR</h6>
                            <h4>
                                <p>
                                    Procure o Sindicato Rural ou o Sindicato dos Trabalhadores Rurais de seu município e saiba como participar
                                </p>
                            </h4>

                            <a href="https://www.senar-rs.com.br/sindicatos" class="internal-link">
                                ACESSAR SINDICATOS
                            </a>
                        </div>

                        <div class="col-sm-6">
                            <div class="course-requires">
                                <h6> Requisitos </h6>
                                @if(!empty(trim($curso->escolaridade)))
                                <div class="required-item">
                                    <img src="{{ asset('images/icons/pencil.png') }}" alt="">
                                    <span class="fw-bold">Escolaridade:</span> <span>{{ $curso->escolaridade }}</span>
                                </div>
                                @endif
                                @if(!empty(trim($curso->idade)))
                                <div class="required-item">
                                    <img src="{{ asset('images/icons/singleman.png') }}" alt="">
                                    <span class="fw-bold">Idade:</span> <span>{{ $curso->idade }}</span>
                                </div>
                                @endif
                                @if(!empty(trim($curso->minimodeparticipantes)))
                                <div class="required-item">
                                    <img src="{{ asset('images/icons/upleft.png') }}" alt="">
                                    <span class="fw-bold">Mínimo de participantes:</span> <span>{{ $curso->minimodeparticipantes }}</span>
                                </div>
                                @endif
                                @if(!empty(trim($curso->maximodeparticipantes)))
                                <div class="required-item">
                                    <img src="{{ asset('images/icons/upr.png') }}" alt="">
                                    <span class="fw-bold">Máximo de participantes:</span> <span>{{ $curso->maximodeparticipantes }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!empty(trim($curso->conteudoprogramatico)))
    <div class="conteudo-programatico curso-single">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h5 class="page-subtitle">Conteúdo Programático</h5>
                </div>
                <div class="col-xs-12">
                    <div class="auto-width html">
                        {!! $curso->conteudoprogramatico !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    {{--Proximas agendas do Curso -Implementar- --}}

    @include('frontend.partials.curso', ['proximasAgendas' => $proximasAgendas])

    @if($curso->depoimentos->isNotEmpty())
        <div class="depoimentos depoimentos-cursos">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="page-title center">
                            Depoimentos
                        </h3>
                    </div>
                    <div class="col-xs-12">
                        <div class="depoimentos-carousel">
                            @foreach($curso->depoimentos as $depoimento)
                            <div>
                                <div class="quote-container">
                                    <p class="quote-text">"{{ $depoimento->texto }}"</p>
                                    <p class="quote-author">- {{ $depoimento->autor ?? "" }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
