@extends('templates.master')

@section('css-vendor')
    <link rel="stylesheet" href="{{ asset('js/vendor/lightcase-2.5.0/src/css/lightcase.css') }}">

    <style>
        .menu-2-container {
            border-bottom: 1px solid #c7c7c7;
        }
    </style>

@endsection

@section('js-vendor')
    <script src="{{ asset('js/vendor/lightcase-2.5.0/src/js/lightcase.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.event.touch.js') }}"></script>
@endsection

@section('content')

    @php
        $pageVars = [];

        if($noticia && !empty(trim($noticia->imagem))) {
            $pageVars['bgPagePath'] = \Voyager::image($noticia->imagem);
        }
    @endphp

    {{-- @include('components.banner-page', $pageVars); --}}

    <div class="noticias-section noticias-single">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="news-date text-center">
                        <span>{{ $noticia->createdAt() }}</span>
                    </div>
                    <h3 class="page-title center">
                        {!! $noticia->titulo !!}
                    </h3>
                    <div class="news-categories text-center">
                        <span>{{ optional($noticia->category)->titulo ?? '' }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="news-content html">
                        {!! $noticia->texto !!}
                    </div>
                </div>
            </div>
        </div>

        @if(!empty($galeria))
            <br><br><br>
            <div class="galeria-de-images bg-grey">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <h5 class="page-subtitle">Galeria de Fotos</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="galeria-imagem-itens text-center">
                                @foreach($galeria as $img)
                                    <a
                                        href="{{  \Voyager::image($img) }}"
                                        data-rel="lightcase:galeriaProgramas"
                                        style="background-image: url('{{ \Voyager::image($img) }}')">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="share">
                        <span>Compartilhe:</span>
                        @php
                            $currentUrl = url()->current();
                        @endphp
                        <span>
                            <a target="_blank" href="https://www.facebook.com/sharer.php?u={{ $currentUrl }}">
                            <img
                                src="{{ asset('images/icons/facebook.png') }}"
                                alt=""></a>
                        </span>
                        <span>
                            <a target="_blank" href="https://twitter.com/share?url={{ $currentUrl }}&text={{ $noticia->titulo }}&hashtags=senar-rs">
                            <img
                                src="{{ asset('images/icons/twitter.png') }}"
                                alt=""></a>
                        </span>
                        {{-- <span>
                            <img
                                src="{{ asset('images/icon-social-instagram.png') }}"
                                width="40"
                                alt="">
                        </span> --}}
                        <span>
                            <a target="_blank" href="https://pinterest.com/pin/create/bookmarklet/?url={{ $currentUrl }}&description={{ $noticia->titulo }}">
                            <img
                                src="{{ asset('images/icons/pinterest.png') }}"
                                alt=""></a>
                        </span>
                        {{-- <span>
                            <img
                                src="{{ asset('images/icon-social-whatsapp.png') }}"
                                width="40"
                                alt="">
                        </span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
