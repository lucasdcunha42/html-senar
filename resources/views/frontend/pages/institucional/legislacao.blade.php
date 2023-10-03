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

    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <input type="text" id="filtroPesquisa" placeholder="Digite o termo de busca">
                <button type="button" class="btn btn-transparent xis" aria-label="Close" id="limpar">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
        </div>
    </div>

    @if($legislacaoCategorias->isNotEmpty())
        <div class="accordion-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
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
                                                        <a target="_blank" class="legislacao-link" data-pdf="{{ 'http://127.0.0.1:8000/storage/' . $files[0]->download_link }}" >
                                                            {!! $legislacao->titulo !!}
                                                        </a>
                                                    </div>
                                                @elseif(!empty($legislacao->link))
                                                    <div class="link-legislacao">
                                                        <a target="_blank" href="{{ $legislacao->link }}">
                                                            {!! $legislacao->titulo !!}
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="link-legislacao">
                                                        <h4>{!! $legislacao->titulo !!}</h4>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="modal fade custom-modal" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg custom-modal-dialog" role="document">
                                <div class="modal-content custom-modal-content">
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
                                                <h5 class="modal-title" id="pdfModalLabel"></h5>
                                            </div>
                                        </div>
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
    @endif


@endsection

@section('js')
    <script>

        // Função para fechar todos os dropdowns
        function fecharTodosDropdowns() {
            const dropdowns = document.querySelectorAll('.accord-desc');
            dropdowns.forEach(dropdown => {
                dropdown.style.display = 'none';
            });
        }

        function mostrarTodasCategorias() {
            const categorias = document.querySelectorAll('.accord-item');
            categorias.forEach(categoria => {
                categoria.style.display = 'block';
            });
        }


        document.getElementById('limpar').addEventListener('click', function () {
            filtrarLegislacoes('');
            fecharTodosDropdowns();
            mostrarTodasCategorias();
            document.getElementById('filtroPesquisa').value = '';
        });

        // Função para filtrar as legislações com base no termo de busca
        function filtrarLegislacoes(termo) {
            const linksLegislacao = document.querySelectorAll('.link-legislacao');
            const categorias = document.querySelectorAll('.accord-item');

            categorias.forEach(categoria => {
                let categoriaEncontrada = false;

                categoria.querySelectorAll('.link-legislacao').forEach(link => {
                    const titulo = link.textContent.toLowerCase();

                    if (termo === '' || titulo.includes(termo)) {
                        link.style.display = 'block';
                        categoriaEncontrada = true;
                    } else {
                        link.style.display = 'none';
                    }
                });

                if (categoriaEncontrada) {
                    categoria.style.display = 'block';
                    // Mostra o dropdown correspondente
                    categoria.querySelector('.accord-desc').style.display = 'block';
                } else {
                    categoria.style.display = 'none';
                }
            });
        }

        // Evento para abrir o modal e carregar o PDF ao clicar no link da legislação
        $('.legislacao-link').click(function(e) {
            pdfLink = $(this).data('pdf');
            const legislacaoTitulo = $(this).text(); // Obtém o título da legislação
            console.log(pdfLink);
            $('#pdfIframe').attr('src', pdfLink);
            $('#pdfModalLabel').text(legislacaoTitulo); // Define o título do modal dinamicamente
            $('#pdfModal').modal('show');

        });

        // Evento para limpar a URL do PDF quando o modal for fechado
        $('#pdfModal').on('hidden.bs.modal', function () {
            $('#pdfIframe').attr('src', '');
            $('#pdfModalLabel').text(''); // Limpa o título do modal ao fechar
            pdfLink = '';
        });

        // Evento para filtrar as legislações ao digitar no campo de busca
        $('#filtroPesquisa').on('input', function() {
            const termoBusca = $(this).val().trim().toLowerCase();
            filtrarLegislacoes(termoBusca);
        });
    </script>
@endsection
