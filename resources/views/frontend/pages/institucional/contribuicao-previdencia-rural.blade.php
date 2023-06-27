@extends('templates.master')

@section('content')

    @php
        $pageVars = [];

        if($page && !empty(trim($page->banner))) {
            $pageVars['bgPagePath'] = urlStorage($page->banner, 1400, 300);
        }

    @endphp

@include('components.banner-page', $pageVars)

    <div class="o-senar-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="page-title center">
                        Arrecadação</h3>
                </div>
            </div>
        </div>
    </div>

    @if($contribuicoesCategoria->isNotEmpty())
        <div class="accordion-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="accordion-container">
                            @foreach($contribuicoesCategoria as $categoria)
                            <div class="accord-item">
                                <div class="accord-title">
                                    <span>{{ $categoria->titulo }}</span>
                                    <button class="btn-open-close">
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                                <div class="accord-desc">
                                    @foreach($categoria->contribuicoes as $item)
                                        <div class="contribuicoes-item">
                                            @if($item->attrFilled('link'))
                                                <div class="contribuicao-link">
                                                    <a target="_blank" href="{{ $item->link }}">
                                                        {{ $item->titulo }}
                                                    </a>
                                                </div>
                                            @else
                                                @if($item->attrFilled('download'))
                                                    {!! $item->downloadLink() !!}
                                                @endif
                                            @endif
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
    @endif

@endsection
