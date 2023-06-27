@extends('templates.master')

@section('content')

    @php
        $pageVars = [];

        if($page && !empty(trim($page->banner))) {
            $pageVars['bgPagePath'] = urlStorage($page->banner, 1400, 300);
        }

    @endphp

    @include('components.banner-page', $pageVars)

    @if($page)
        <div class="o-senar-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="page-title center">
                            {{ $page->titulo }}
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="container-90-per-cent">
                            <div class="page-description html">
                                {!! $page->texto !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($objetivos->isNotEmpty())
        <div class="o-senar-objetivos bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h5 class="page-title">Objetivos</h5>
                    </div>
                </div>

                <div class="objetivos-list clearfix">

                    @foreach($objetivos as $objetivo)

                        <div class="objetivos-item">
                            <div class="n n-1">{{ $objetivo->titulo }}</div>
                            <div class="desc">
                                <p>{{ $objetivo->texto }}</p>
                            </div>
                        </div>

                        @if($loop->iteration % 3 == 0)
                            <div class="clearfix visible-sm"></div>
                        @endif

                    @endforeach

                </div>
            </div>
        </div>
    @endif

    @if($estrutura)
    <div class="o-senar-estrutura">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h5 class="page-title">{!! $estrutura->titulo !!}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="container-90-per-cent">
                        <div class="page-description html">
                            {!! $estrutura->conteudo !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <img
                        class="img-responsive center-block"
                        src="{{ asset('storage/' . $estrutura->imagem) }}"
                        alt="">
                    {{-- <div class="estrutura-arvore">
                        <div class="section-superintendencia">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="label-item label-superintendencia">
                                        <span>Superintendência</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-secretarias">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="label-item label-secretarias">
                                        <span>Secretaria Executiva</span>
                                    </div>
                                    <div class="label-item label-secretarias">
                                        <span>Assessoria Especial</span>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="label-item label-secretarias">
                                        <span>Assessoria Jurídica</span>
                                    </div>
                                    <div class="label-item label-secretarias">
                                        <span>Assessoria de Comunicação</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-divisoes clearfix">
                            <div class="divisao first-divisao">
                                <div class="divisao-item divisao-item-title">
                                    <div class="d-table">
                                        <span class="d-table-cell">Divisão de Administração e Finanças</span>
                                    </div>
                                </div>
                                <div class="divisao-item">
                                    <div class="d-table">
                                        <span class="d-table-cell">Coordenação Administrativa</span>
                                    </div>
                                </div>
                                <div class="divisao-item">
                                    <div class="d-table">
                                        <span class="d-table-cell">Coordenação Controladoria</span>
                                    </div>
                                </div>
                                <div class="divisao-item">
                                    <div class="d-table">
                                        <span class="d-table-cell">Coordenação de Tecnologia da Informação</span>
                                    </div>
                                </div>
                            </div>
                            <div class="divisao">
                                <div class="divisao-item divisao-item-title">
                                    <div class="d-table">
                                        <span class="d-table-cell">Divisão Técnica</span>
                                    </div>
                                </div>
                                <div class="divisao-item">
                                    <div class="d-table">
                                        <span class="d-table-cell">Coordenação de Formação de Profissional Rural</span>
                                    </div>
                                </div>
                                <div class="divisao-item">
                                    <div class="d-table">
                                        <span class="d-table-cell">Coordenação de Promoção Social</span>
                                    </div>
                                </div>
                                <div class="divisao-item">
                                    <div class="d-table">
                                        <span class="d-table-cell">Coordenação de Programas Especiais Especiais</span>
                                    </div>
                                </div>
                                <div class="divisao-item">
                                    <div class="d-table">
                                        <span class="d-table-cell">Coordenação de Supervisão Regional</span>
                                    </div>
                                </div>
                                <div class="divisao-item">
                                    <div class="d-table">
                                        <span class="d-table-cell">Coordenação de Feiras e Eventos</span>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix visible-md visible-sm"></div>

                            <div class="divisao">
                                <div class="divisao-item divisao-item-title">
                                    <div class="d-table">
                                        <span class="d-table-cell">Divisão de Gestão de Arrecadação</span>
                                    </div>
                                </div>
                                <div class="divisao-item">
                                    <div class="d-table">
                                        <span class="d-table-cell">Coordenação de Arrecadação</span>
                                    </div>
                                </div>
                            </div>
                            <div class="divisao last-divisao">
                                <div class="divisao-item divisao-item-title">
                                    <div class="d-table">
                                        <span class="d-table-cell">Divisão de Projetos e Relações Institucionais</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($video)
    <div class="o-senar-video bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h5 class="page-title">Assista Nosso Vídeo Institucional</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $video->video }}"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($depoimentos->isNotEmpty())
        <div class="depoimentos-container footer-no-margin-top footer-white" style="background-image: url({{ asset('storage/' . optional($blocoBgDepoimentos)->imagem ?? '') }})">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center text-white">
                        <h5 class="page-title">Depoimentos</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="depoimentos-carousel">

                            @foreach ($depoimentos as $depoimento)
                                <div>
                                    <div class="depoimento">
                                        <p>{{ $depoimento->texto}}</p>
                                    </div>

                                    <div class="autor">
                                        <p class="nome">{{ $depoimento->autoria }}</p>
                                        <p class="local">{{ $depoimento->regiao_autor }}</p>
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
