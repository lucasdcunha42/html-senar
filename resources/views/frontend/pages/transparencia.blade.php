@extends('templates.master')

@section('content')

    @php
        $pageVars = [];

        if($page && !empty(trim($page->banner))) {
            $pageVars['bgPagePath'] = urlStorage($page->banner, 1400, 300);
        }
    @endphp
    @include('components.banner-page', $pageVars)

    <div class="transparencia">
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
                    <div class="page-description html">
                        {!! $page->texto !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($transparencias->isNotEmpty())
        <div class="accordion-section transparencia-accordion">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="accordion-container">
                            @foreach($transparencias as $transparencia)
                                <div class="accord-item">
                                    <div class="accord-title">
                                        <span>{{ $transparencia->titulo }}</span>
                                        <button class="btn-open-close">
                                            <span></span>
                                            <span></span>
                                        </button>
                                    </div>
                                    <div class="accord-desc">
                                        <div class="texto html">
                                            {!! $transparencia->texto !!}
                                        </div>
                                        <div class="downloads">
                                            @foreach($transparencia->arquivos as $arquivo)
                                                <a href="{{ route('transparencia.download', $arquivo->id) }}">{{ $arquivo->titulo }}</a><br>
                                            @endforeach
                                        </div>
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
