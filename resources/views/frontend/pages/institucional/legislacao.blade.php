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
                                                            <a target="_blank" class="legislacao-link" data-pdf="{{ 'storage/' . $files[0]->download_link }}" >
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
                            <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="pdfModalLabel">Visualizar PDF</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <iframe id="pdfIframe" width="100%" height="700px"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


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
