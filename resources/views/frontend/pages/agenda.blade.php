@extends('templates.master')

@section('js-vendor')
    <script
        type="text/javascript"
        src="{{ asset('js/vendor/moment.min.js') }}">
    </script>
    <script
        type="text/javascript"
        src="{{ asset('js/vendor/daterangepicker/daterangepicker.min.js') }}">
    </script>
@endsection

@section('content')
    @php
        $pageVars = [];

        if ($page && !empty(trim($page->banner))) {
            $pageVars['bgPagePath'] = urlStorage($page->banner, 1400, 300);
        }
    @endphp

    @include('components.banner-page', $pageVars)

    <div class="agenda-section agenda-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="page-title center">
                        {{ $page->titulo }}
                    </h3>
                </div>
                <div class="col-xs-12 text-center site-text html">
                    {!! $page->texto !!}
                </div>
            </div>
        </div>
    </div>

    <div class="agenda-section agenda-busca bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    {{-- Barra de Filtros --}}
                    <div class="select-agenda-container">

                            <div class="col-sm-3">
                                <select
                                    name="cidade"
                                    id="agendas-cidade-select"
                                    class="custom-select">                             >
                                    <option value="">Cidade</option>
                                    @foreach ($cidades as $cidade)
                                        <option value="{{ $cidade }}">{{ $cidade }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <div class="search-form">
                                    <div class="search-bar">
                                        <input type="text" name="titulo_agenda" id="titulo_agenda" placeholder="Pesquisa" class="custom-search">
                                        <button type="submit" class="search-button">Buscar</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="btn-noticias">
                                    <input type="text" id="calendarioAgenda" name="date" class="form-control search-date" placeholder="Calendario">
                                </div>
                            </div>

                            <div class="col-sm-1">
                                <button href="{{ route('page.agenda')}}" type="button" class="btn btn-primary" id="limpa-filtro">Remover Filtros</button>
                            </div>

                    </div>
                </div>
            </div>

            {{-- Lista de Agendas --}}
            <div class="row">
                <div class="col-xs-12">
                    <div class="agenda-lista">
                        <div class="row agendas-container">
                            @include('frontend.pages.agendas-item', ['agendas' => $agendas])
                        </div>
                    </div>
                </div>
                <div class="agendas-loading-container text-center hide-on-load">
                    <img src="{{ asset('images/loading.gif') }}" alt="">
                </div>
                <div class="col-xs-12 text-center">
                    <div class="see-more carregar-mais-agendas">
                        <a href="{{ route('page.agenda.loadMore') }}">Ver mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>

        var dateFormat = 'DD/MM/YYYY';

        var config = {
            "autoUpdateInput": false,
            "locale": {
                "format": dateFormat,
                "separator": " - ",
                "applyLabel": "Aplicar",
                "cancelLabel": "Cancelar",
                "fromLabel": "De",
                "toLabel": "Até",
                "customRangeLabel": "Custom",
                "daysOfWeek": [
                    "Dom",
                    "Seg",
                    "Ter",
                    "Qua",
                    "Qui",
                    "Sex",
                    "Sáb"
                ],
                "monthNames": [
                    "Janeiro",
                    "Fevereiro",
                    "Março",
                    "Abril",
                    "Maio",
                    "Junho",
                    "Julho",
                    "Agosto",
                    "Setembro",
                    "Outubro",
                    "Novembro",
                    "Dezembro"
                ],
                "firstDay": 0
            }
        };

        var inputSelector = $('#calendarioAgenda');
        var dateInput = $(inputSelector);


        dateInput.daterangepicker(config);
        dateInput.val('');

        dateInput.on('apply.daterangepicker', function(ev, picker) {
            dateInput.val(picker.startDate.format(dateFormat) + ' - ' + picker.endDate.format(dateFormat));
        });

        dateInput.on('cancel.daterangepicker', function(ev, picker) {
            dateInput.val('');
        });

        dateInput.on('apply.daterangepicker', function(ev, picker) {
            $('.search-date + img').click();
        });

    </script>
@endsection

