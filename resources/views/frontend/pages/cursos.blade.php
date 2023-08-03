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

            <div class="row container-auto-width-cursos">
                <div class="search-form">
                    <div class="search-bar">
                        <input type="text" name="nome_curso" id="nome_curso" placeholder="Pesquisa" class="custom-search">
                        <button type="submit" class="search-button">Buscar</button>
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


    @include('frontend.partials.agenda')
@endsection
