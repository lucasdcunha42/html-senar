<div id="site-menus" class="visible-md visible-lg">

    <div class="container container-logo-header">
        <a href="{{ route('page.home') }}">
            <img class="logo-header" src="{{ asset('storage/' . setting('site.logo')) }}" alt="SENAR RS">
        </a>
    </div>
    <div class="menu-1-container">
        <div class="container">
            <div class="row">
                <div class="col-xs-2">
                    &nbsp;
                </div>
                <div class="col-xs-8">
                    <ul class="menu menu-1-items">
                        <li>
                            <a href="">O Senar</a>
                            <div class="sub-menu-container">
                                <div class="sub-menu-container-internal">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('page.o-senar') }}">Institucional Test</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('page.legislacao') }}">Legislação</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('page.atividades') }}">Relatórios</a>
                                                </li>

                                                {{-- <li>
                                                    <a href="#">Vídeos</a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                        <div class="col-sm-5">
                                            <ul>
                                                <li>
                                                    <a target="_blank" href="http://app3.cna.org.br/transparencia/#RS-2022-0">Licitações</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('page.contribuicao.previdencia.rural') }}">Arrecadação</a>
                                                </li>
                                                {{-- <li>
                                                    <a href="#">Dados da Gestão LDO 2017</a>
                                                </li>
                                                <li>
                                                    <a href="#">Senar na Mídia</a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('page.onde-estamos') }}">Onde Estamos</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('page.trabalhe.conosco') }}">Trabalhe Conosco</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu-separator">|</li>
                        <li>
                            {{-- <a href="">Imprensa</a> --}}
                            <a href="{{ route('page.news.index') }}">Notícias</a>
                            {{-- <div class="sub-menu-container">
                                <div class="sub-menu-container-internal">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('page.news.index') }}">Notícias</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul>
                                                <li>
                                                    <a href="#">Multimídia</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul>
                                                <li>
                                                    <a href="#">Downloads</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </li>
                        {{-- <li class="menu-separator">|</li>
                        <li>
                            <a href="">Certificados</a>
                        </li> --}}
                        <li class="menu-separator">|</li>
                        <li>
                            <a href="{{ route('page.transparencia') }}">Transparência e Prestação de Contas</a>
                        </li>
                        <li class="menu-separator">|</li>
                        <li>
                            <a href="https://www.senar-rs.com.br/contato">Contato</a>
                            {{-- <div class="sub-menu-container">
                                <div class="sub-menu-container-internal">
                                    <div class="row"> --}}
                                        {{-- <div class="col-sm-3">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('page.contato') }}">Geral</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('page.cursos.supervisao') }}">Supervisão</a>
                                                </li>
                                            </ul>
                                        </div> --}}
                                        {{-- <div class="col-sm-4">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('page.apoiadores') }}">Patrocinios</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('page.cursos.arrecadacao') }}">Arrecadação</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('page.quero.ser.fornecedor') }}">Quero ser Fornecedor</a>
                                                </li>
                                            </ul>
                                        </div> --}}
                                        {{-- <div class="col-xs-12">
                                            <ul>
                                                <li>
                                                    <a target="_blank" href="https://cnabrasil.org.br/fale-conosco/senar">Fale Conosco</a>
                                                </li>
                                            </ul>
                                        </div> --}}
                                    {{-- </div>
                                </div>
                            </div> --}}
                        </li>
                    </ul>
                </div>
                <div class="col-xs-2 siges-text">
                    <a class="siges-net-link" target="_blank" href="https://sigesnet.senar-rs.com.br">Acessar SIGESNET</a>
                </div>
            </div>
        </div>
    </div>

    <div class="menu-2-container">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    &nbsp;
                </div>
                <div class="col-md-7">
                    <ul class="menu menu-2-items">
                        <li>
                            <a href="{{ route('page.cursos') }}">Cursos</a>
                        </li>
                        <li>
                            <a href="{{ route('page.agenda') }}">Agenda</a>
                        </li>
                        <li>
                            <a href="{{ route('page.programas') }}">Programas</a>
                        </li>
                        <li>
                            <a target="_blank" href="http://www.senar-rs.com.br/ateg/">ATEG</a>
                        </li>
                        <li>
                            <a href="{{ route('page.eventos') }}">Eventos</a>
                        </li>
                        <li>
                            <a href="{{ route('page.sindicatos') }}">Sindicatos</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="weather-social-icons" style="text-align: right;">
                        <div class="social-icons">
                            @include('components.social-links')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
