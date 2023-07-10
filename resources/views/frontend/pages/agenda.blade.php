@extends('templates.master')

@section('content')

    @php
        $pageVars = [];

        if($page && !empty(trim($page->banner))) {
            $pageVars['bgPagePath'] = urlStorage($page->banner, 1400, 300);
        }
    @endphp

@include('components.banner-page', $pageVars);

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
                            {{-- Filtro de Região
                            <div class="col-xs-12 col-sm-6">
                                <select
                                    id="cursos-regiao"
                                    data-target="regiao"
                                    class="custom-select">
                                    <option value="">Região</option>
                                    @foreach ($regioes as $key => $value)
                                        <option value="{{ $key }}">{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            {{-- Filtro de Cidade --}}
                            <div class="col-xs-12 col-sm-12">
                                <select
                                    id="cursos-cidade"
                                    data-target="cidade"
                                    class="custom-select">
                                    <option value="">Cidade</option>
                                    @foreach ($cidades as $key => $value)
                                        <option value="{{ $key }}">{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- Texto Região Cidade
                    <div class="select-agenda-container">
                        <div class="row">
                            <p class="page-title center">
                            </p>
                        </div>
                    </div>  --}}
                </div>
            </div>

            {{-- Lista Cursos --}}

            <div class="row">
                <div class="col-xs-12">
                    <div class="row agenda-itens" data-auto-load="{{ $startAutoLoadObject }}">
                            @include('frontend.pages.agenda-load-more', ['cursos' => $cursos])
                        </div>
                    </div>
                    <div class="col-xs-12 text-right counter">
                        <b>
                            <span class="current-count">{{ $cursos->count() }}</span>
                            <span class="of-count">de</span>
                            <span class="total-count">{{ $total }}</span>
                        </b>
                    </div>
                    <div class="loading-container text-center">
                        <img src="{{ asset('images/loading.gif') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
