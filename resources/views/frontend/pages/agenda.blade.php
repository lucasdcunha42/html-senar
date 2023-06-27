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
                    {{-- <div class="buttons-animated buttons-tipos">

                        @foreach($tipos as $key => $tipo)
                            <button
                                class="{{ $loop->first ? 'active' : '' }}"
                                data-tipo="{{ $key }}">
                                <span>{{ $tipo }}</span>
                            </button>
                        @endforeach

                            <button
                                class=""
                                data-tipo="0">
                                <span>Todos</span>
                            </button>

                        <div class="line-container">
                            <div class="line-indicator"></div>
                        </div>

                    </div> --}}

                    <div class="select-agenda-container">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"></div>
                            <div class="col-xs-6 col-sm-4">
                                <select
                                    id="cursos-regiao"
                                    data-target="regiao"
                                    class="custom-select">
                                    <option value="">Região</option>
                                    @foreach ($regioes as $key => $value)
                                        <option value="{{ $key }}">{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-6 col-sm-4">
                                <select
                                    id="cursos-modalidade"
                                    data-target="modalidade"
                                    class="custom-select">
                                    <option value="">Modalidades</option>
                                    @foreach ($modalidades as $key => $value)
                                        <option value="{{ $key }}">{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
