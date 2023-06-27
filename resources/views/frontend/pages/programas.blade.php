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

    @if($programas->isNotEmpty())
        <div class="programas-itens bg-grey">
            <div class="container">
                @foreach($programas->chunk(3) as $row)
                    <div class="row">
                        @foreach($row as $key => $programa)
                            <div class="col-sm-4">
                                @include('components.c-thumb-1', ['programa' => $programa])
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection
