@extends('templates.master')

@section('content')

    @php
        $pageVars = [];

        if($page && !empty(trim($page->banner))) {
            $pageVars['bgPagePath'] = urlStorage($page->banner, 1400, 300);
        }

        function getDataFinalInscricaoHtml($date) {
            return '';
            // return ' - <small style="font-size: 12px; font-weight: bold;">Data final da inscrição: ' . $date . '</small>';

        }

    @endphp

    @include('components.banner-page', $pageVars)

    <div class="arrecadacao-section">
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
                    <div class="page-description">
                        {!! $page->texto !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($oportunidades->isNotEmpty())
        <div class="container">
            <div class="row">
                <h2 style="text-align:center;margin-bottom:50px;font-size:25px;font-weight: bolder;">
                    Em andamento:
                </h2>
            </div>
        </div>
        <div class="accordion-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="accordion-container">
                            <div class="accordion-container">
                                @foreach ($oportunidades as $oportunindade)
                                    <div class="accord-item">
                                        <div class="accord-title">
                                            <span>{!! $oportunindade->titulo !!} {!! getDataFinalInscricaoHtml($oportunindade->getDataFinalInscricao()) !!}
                                            </span>
                                            <button class="btn-open-close">
                                                <span></span>
                                                <span></span>
                                            </button>
                                        </div>
                                        <div class="accord-desc">
                                            @foreach($oportunindade->arquivos as $arquivo)
                                                <div class="link-legislacao">
                                                    <a target="_blank" href="{{ $arquivo->link }}">
                                                        {!! $arquivo->titulo !!}
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


@if($oportunidadesencerradas->isNotEmpty())
        <div class="container">
            <div class="row">
                <h2 style="text-align:center;margin-bottom:50px;font-size:25px;font-weight: bolder;">
                    Encerradas:
                </h2>
            </div>
        </div>
        <div class="accordion-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="accordion-container">
                            <div class="accordion-container">
                                @foreach ($oportunidadesencerradas as $oportunindade)
                                    <div class="accord-item">
                                        <div class="accord-title">
                                            <span>{!! $oportunindade->titulo !!} {!! getDataFinalInscricaoHtml($oportunindade->getDataFinalInscricao()) !!}</span>
                                            <button class="btn-open-close">
                                                <span></span>
                                                <span></span>
                                            </button>
                                        </div>
                                        <div class="accord-desc">
                                            @foreach($oportunindade->arquivos as $arquivo)
                                                <div class="link-legislacao">
                                                    <a target="_blank" href="{{ $arquivo->link }}">
                                                        {!! $arquivo->titulo !!}
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- @if($legislacaoCategorias->isNotEmpty())
        <div class="accordion-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="accordion-container">
                            <div class="accordion-container">
                                @foreach ($legislacaoCategorias as $categoria)
                                    <div class="accord-item">
                                        <div class="accord-title">
                                            <span>{{ $categoria->titulo }}</span>
                                            <button class="btn-open-close">
                                                <span></span>
                                                <span></span>
                                            </button>
                                        </div>
                                        <div class="accord-desc">
                                            @foreach($categoria->legislacoes as $legislacao)
                                                <div class="link-legislacao">
                                                    <a target="_blank" href="{{ $legislacao->link }}">
                                                        {{ $legislacao->titulo }}
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif --}}
@endsection
