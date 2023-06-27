@extends('templates.master')

@section('content')

    @php
        $pageVars = [];

        if($page && !empty(trim($page->banner))) {
            $pageVars['bgPagePath'] = urlStorage($page->banner, 1400, 300);
        }

    @endphp

    @include('components.banner-page', $pageVars)

    <div class="programas-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="page-title center">
                        {{ $page->titulo }}
                    </h3>
                </div>
            </div>
            @if(!empty(trim($page->texto)))
                <div class="row">
                    <div class="col-xs-12">
                        <div class="container-90-per-cent">
                            <div class="page-description">
                                {!! $page->texto !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="accordion-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="accordion-container accordion-container-100">
                        <div class="accord-item">
                            <div class="accord-title">
                                <span>{{ setting('admin.processos-licitarios-em-andamento', 'PROCESSOS LICITÁRIOS EM ANDAMENTO') }}</span>
                                <button class="btn-open-close">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                            <div class="accord-desc">
                                <div class="texto html">
                                    <p>&nbsp;<a title="Licita&ccedil;&otilde;es em andamento - Link Externo" href="{{ setting('admin.link-externo-processos-licitarios-em-andamento') }}" target="_blank" rel="noopener noreferrer">Licita&ccedil;&otilde;es em andamento - Link Externo</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($all as $title => $licitacoes)
    @if($licitacoes->isNotEmpty())
        <div class="accordion-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="accordion-container accordion-container-100">
                            <div class="accord-item">
                                <div class="accord-title">
                                    <span>{{ $title }}</span>
                                    <button class="btn-open-close">
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                                <div class="accord-desc">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Modalidade</th>
                                                    <th>Objeto</th>
                                                    <th>Número/Ano</th>
                                                    <th>Processo</th>
                                                    <th>Licitantes</th>
                                                    <th>Download</th>
                                                    <th>Abertura</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($licitacoes as $l)
                                                    <tr>
                                                        <td>{{$l->modalidade }}</td>
                                                        <td>{{ $l->objeto }}</td>
                                                        <td>{!! $l->numero_ano !!}</td>
                                                        <td>{{ $l->processo }}</td>
                                                        <td>{{ $l->licitante }}</td>
                                                        <td class="text-center">
                                                            @if($l->status == 1)
                                                                @if(!empty($l->arquivo_edital) && isset((json_decode($l->arquivo_edital))[0]->download_link))
                                                                    @php
                                                                        $file = (json_decode($l->arquivo_edital))[0]->download_link;
                                                                    @endphp
                                                                    <a target="_blank" href="{{ asset('storage/' . $file) }}">
                                                                        <img src="{{ asset('images/icon-download.png') }}" alt="" width="30">
                                                                    </a>
                                                                    <br />
                                                                @endif
                                                            @else
                                                                @if(!empty($l->arquivo_resultado) && isset((json_decode($l->arquivo_resultado))[0]->download_link))

                                                                    @php
                                                                        $file = (json_decode($l->arquivo_resultado))[0]->download_link;
                                                                    @endphp
                                                                    <a target="_blank" href="{{ asset('storage/' . $file) }}">
                                                                        Resultado
                                                                    </a>
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td>{{ $l->getDataAbertura() }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @endforeach

    {{--
    <div class="form form-licitacoes">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="page-title center">
                        Para Preencher o Formulário de Licitação Escolha o Tipo de Acesso
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-licitacoes-container">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <div class="buttons-animated">

                                    <button
                                        class="active action-button" data-method="showFormLicitacaoEmpresa">
                                        <span>Empresa</span>
                                    </button>
                                    <button
                                        class="action-button"
                                        data-method="showFormLicitacaoCliente">
                                        <span>Cliente</span>
                                    </button>

                                    <div class="line-container line-grey">
                                        <div class="line-indicator"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                @include('frontend.forms.licitacao-empresa')
                                @include('frontend.forms.licitacao-cliente')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    --}}


@endsection
