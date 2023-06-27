@extends('templates.master')

@section('content')

    @php
        $pageVars = [];

        if($page && !empty(trim($page->banner))) {
            $pageVars['bgPagePath'] = urlStorage($page->banner, 1400, 300);
        }

    @endphp

    @include('components.banner-page', $pageVars)

    <div class="accordion-section">
        <div class="container">
            @foreach($relatorioscategoria as $categoria)
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="page-title center">
                            {{ $categoria->titulo }}
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="accordion-container">
                            @foreach ($categoria->relatorios as $relatorio)
                                <div class="accord-item">
                                    <div class="accord-title">
                                        <span>{{ $relatorio->titulo }}</span>
                                        <a target="_blank" href="{{ $relatorio->getLink() }}">
                                            <button class="btn-open-close">
                                                <span></span>
                                                <span></span>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
