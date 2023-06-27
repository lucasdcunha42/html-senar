@extends('templates.master')

@section('content')
    @php
        $pageVars = [];

        if($page && !empty(trim($page->banner))) {
            $pageVars['bgPagePath'] = urlStorage($page->banner, 1400, 300);
        }
    @endphp

    @include('components.banner-page', $pageVars)

    <div class="cursos-section cursos">
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
                    <div class="container-auto-width-cursos">
                        <div class="row">
                            <div class="col-sm-4">
                                <select
                                    name="area-interesse"
                                    id="cursos-area-interesse-select"
                                    class="custom-select">
                                    <option value="">Área de Interesse</option>
                                    @foreach ($areaInteresse as $value)
                                        <option value="{{ $value->interesse }}">{{ $value->interesse }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select
                                    name="regiao"
                                    id="cursos-regiao-select"
                                    class="custom-select">
                                    <option value="">Região</option>
                                    @foreach ($regiaoEvento as $value)
                                        <option value="{{ $value->regiao }}">{{ $value->regiao }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select
                                    name="ano-mes"
                                    id="cursos-ano-mes-select"
                                    class="custom-select">
                                    <option value="">Mês</option>
                                    @foreach ($mesAno as $key => $value)
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
                    <div class="cursos-lista">
                        <div class="row cursos-container">
                            @include('frontend.pages.cursos-item', ['cursos' => $cursos])
                        </div>
                    </div>
                </div>
                <div class="cursos-loading-container text-center hide-on-load">
                    <img src="{{ asset('images/loading.gif') }}" alt="">
                </div>
                <div class="col-xs-12 text-center">
                    <div class="see-more carregar-mais-cursos">
                        <a href="{{ route('page.cursos.load.more') }}">Ver mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="cursos-section catalogo bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="page-title center">
                        Catálogo de Cursos
                    </h3>
                </div>
            </div>
            <div class="row hidden-xs">
                @foreach($finalArrayCollumns as $key => $arrayCollum)
                    <div class="col-sm-4">
                        @foreach ($arrayCollum as $letter => $cursos)
                            <div class="catalogo-item">
                                <div class="catalogo-item-letter">
                                    {{ $letter }}
                                </div>
                                <div class="catalogo-item-cursos">
                                    @foreach($cursos as $curso)
                                        <div class="catalogo-item-link">
                                            &bull;&nbsp;<a href="{{ route('page.cursos.single', $curso->slug) }}">{{ $curso->titulo . ' (' . $curso->regiaoevento . ')' }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <div class="row visible-xs">
                <div class="col-xs-12">
                    @foreach($cursosGrouped as $letter => $cursos)
                        <div class="catalogo-item">
                            <div class="catalogo-item-letter">
                                {{ $letter }}
                            </div>
                            <div class="catalogo-item-cursos">
                                @foreach($cursos as $curso)
                                    <div class="catalogo-item-link">
                                        &bull;&nbsp;<a href="{{ route('page.cursos.single', $curso->slug) }}">{{ $curso->titulo. ' (' . $curso->regiaoevento . ')' }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    @include('frontend.partials.agenda')

@endsection
