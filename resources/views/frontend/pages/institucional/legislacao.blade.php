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
                        {{ $page->titulo }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

    @if($legislacaoCategorias->isNotEmpty())
        <div class="accordion-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="accordion-container">
                            <div class="accordion-container">
                                @foreach ($legislacaoCategorias as $categoria)
                                    <div class="accord-item">
                                        <div class="accord-title">
                                            <span>{!! $categoria->titulo !!}</span>
                                            <button class="btn-open-close">
                                                <span></span>
                                                <span></span>
                                            </button>
                                        </div>
                                        <div class="accord-desc">
                                            @foreach($categoria->legislacoes as $legislacao)
                                                <div class="link-legislacao">
    
                                                    @php $files = $legislacao->getArrayFiles() @endphp
                                                    @if(isset($files[0]) && !empty($files[0]->download_link))
                                                        <div>
                                                            <a target="_blank" href="{{ route('download') . '?file=' . $files[0]->download_link }}">
                                                                {!! $legislacao->titulo !!}
                                                            </a>
                                                        </div>
                                                    @elseif(!empty($legislacao->link))
                                                        <div>
                                                            <a target="_blank" href="{{ $legislacao->link }}">
                                                                {!! $legislacao->titulo !!}
                                                            </a>
                                                        </div>
                                                    @else
                                                        <h4>{!! $legislacao->titulo !!}</h4>
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
        </div>
    @endif


@endsection