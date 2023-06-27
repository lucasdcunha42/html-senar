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
                        Eventos
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="button-actions">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="button-actions-container buttons-eventos">
                        <a href="{{ route('page.agenda') }}"><button>Agenda Completa</button></a>
                        <a href="{{ route('page.cursos') }}"><button>Cursos</button></a>
                        <button data-type="1">Feiras e Exposições</button>
                        <button data-type="2">Outros Eventos</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="eventos-container bg-grey">
        <div class="container">
            <div class="row">
                @foreach($eventos as $evento)
                    <div class="col-sm-4 col-md-3 evento-item" data-type="{{ $evento->tipo }}">
                        @include('components.c-thumb-4', ['evento' => $evento])
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
