@extends('templates.master')

@section('content')

    @php
        $pageVars = [];

        if($page && !empty(trim($page->banner))) {
            $pageVars['bgPagePath'] = urlStorage($page->banner, 1400, 300);
        }
    @endphp

    @include('components.banner-page', $pageVars)

    @if($page)
        <div class="contato-section">
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
                        <div class="page-description">
                            {!! $page->texto !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="contato-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-contato-container">
                        <div class="form-site"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
