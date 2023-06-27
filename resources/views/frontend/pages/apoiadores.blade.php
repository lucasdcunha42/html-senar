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
        <div class="noticias-section">
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

    @if($apoiadores->isNotEmpty())
        <div class="logos-apoiadores">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="logos-apoiadores-list">
                            <div class="row mg-0">
                                @foreach ($apoiadores as $apoiador)
                                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                        <a href="{{ $apoiador->link }}" target="_blank" class="thumbnail">
                                            <img src="{{ urlStorage($apoiador->logo) }}" class="img-responsive" alt="">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($patrocinador)
        <div class="quer-ser-patrocinador bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="page-title center">
                            {{ $patrocinador->titulo }}
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-description">
                            {!! $patrocinador->conteudo !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($regras)
        <div class="quer-ser-patrocinador">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="page-title center">
                            {{ $regras->titulo }}
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-description html">
                            {!! $regras->conteudo !!}
                        </div>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-xs-12">
                        <div class="regras-list">
                            <p><span>I</span> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero animi nobis tenetur atque at</p>
                            <p><span>II</span> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero animi nobis tenetur atque at</p>
                            <p><span>III</span> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero animi nobis tenetur atque at</p>
                            <p><span>IV</span> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero animi nobis tenetur atque at</p>
                            <p><span>V</span> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero animi nobis tenetur atque at</p>
                            <p><span>VI</span> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero animi nobis tenetur atque at</p>
                            <p><span>VII</span> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero animi nobis tenetur atque at</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    @endif

@endsection
