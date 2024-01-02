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

        <div class="accordion-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="accordion-container">
                            <h2> Arquivos </h2>
                            <div class="link-legislacao">

                                @php
                                    $files = $noticia->getArrayFiles();
                                @endphp

                                @if(is_array($files) && count($files) > 0)
                                    <ul class="file-list">
                                        @foreach($files as $file)
                                            @if(!empty($file->download_link))
                                                <li>
                                                    <a target="_blank" class="legislacao-link" data-pdf="{{ asset('storage/' . $file->download_link) }}">
                                                        {!! $file->original_name !!}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @else
                                    <div class="link-legislacao">
                                        <h4>Nenhum arquivo disponível.</h4>
                                    </div>
                                @endif
                            </div>
                            <div class="modal fade custom-modal" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg custom-modal-dialog" role="document">
                                    <div class="modal-content custom-modal-content">
                                        @if(is_array($files) && count($files) > 0)
                                            <div class="modal-header">
                                                <div class="row align-items-center">
                                                    <!-- Botão de fechar (coluna 1) -->
                                                    <div class="col-4 text-right">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar" style="padding-right: 20px;">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <!-- Logo (coluna 2) -->
                                                    <div class="col-4 text-center">
                                                        <img src="{{ asset('storage/' . setting('site.logo')) }}" alt="Logo" class="img-fluid" style="max-height: 80px;">
                                                    </div>
                                                    <!-- Título (coluna 3) -->
                                                    <div class="col-4 text-center">
                                                        <h5 class="modal-title" id="pdfModalLabel">
                                                            @if(!empty($files[0]->original_name))
                                                                {!! $files[0]->original_name !!}
                                                            @endif
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-body">
                                                <iframe id="pdfIframe" width="100%" height="700px"></iframe>
                                            </div>
                                        @else
                                            <div class="modal-header">
                                                <div class="row align-items-center">
                                                    <!-- Botão de fechar (coluna 1) -->
                                                    <div class="col-4 text-right">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar" style="padding-right: 20px;">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <!-- Mensagem de erro (coluna 2) -->
                                                    <div class="col-8 text-center">
                                                        <h5 class="modal-title" id="pdfModalLabel">Nenhum arquivo disponível.</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                style="height: 15px; margin: 5px"
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

@section('js')
    <script>

        // Evento para abrir o modal e carregar o PDF ao clicar no link da legislação
        $('.legislacao-link').click(function(e) {
            pdfLink = $(this).data('pdf');
            console.log(pdfLink);

            $('#pdfIframe').attr('src', pdfLink);
            $('#pdfModal').modal('show');
        });

        // Evento para limpar a URL do PDF quando o modal for fechado
        $('#pdfModal').on('hidden.bs.modal', function () {
            $('#pdfIframe').attr('src', '');
            pdfLink = '';
        });

    </script>
@endsection
