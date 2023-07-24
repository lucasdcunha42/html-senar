@extends('templates.master')

@section('content')
    @php
        $pageVars = [];

        if ($page && !empty(trim($page->banner))) {
            $pageVars['bgPagePath'] = urlStorage($page->banner, 1400, 300);
        }
    @endphp

    @include('components.banner-page', $pageVars)

    <div class="agenda-section agenda-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="page-title center">
                        {{ $page->titulo }}
                    </h3>
                </div>
                <div class="col-xs-12 text-center site-text html">
                    {!! $page->texto !!}
                </div>
            </div>
        </div>
    </div>

    <div class="agenda-section agenda-busca bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    {{-- Barra de Filtros --}}
                    <div class="select-agenda-container">
                        <div class="row">
                            <div class="col-sm-4">
                                <select
                                    name="regiao"
                                    id="agendas-regiao-select"
                                    class="custom-select"                                >
                                    <option value="">Região</option>
                                    @foreach ($regioes as $regiao)
                                        <option value="{{ $regiao->regiao }}">{{ $regiao->regiao }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select
                                    name="cidade"
                                    id="agendas-cidade-select"
                                    class="custom-select"                                >
                                    <option value="">Cidade</option>
                                    @foreach ($cidades as $cidade)
                                        <option value="{{ $cidade }}">{{ $cidade }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Lista de Agendas --}}
            <div class="row">
                <div class="col-xs-12">
                    <div class="cursos-lista">
                        <div class="row agendas-container">
                            @include('frontend.pages.agendas-item', ['agendas' => $agendas])
                        </div>
                    </div>
                </div>
                <div class="agendas-loading-container text-center hide-on-load">
                    <img src="{{ asset('images/loading.gif') }}" alt="">
                </div>
                <div class="col-xs-12 text-center">
                    <div class="see-more carregar-mais-agendas">
                        <a href="{{ route('page.agenda.loadMore') }}">Ver mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
