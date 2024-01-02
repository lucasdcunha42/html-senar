@extends('templates.master')

@section('js-vendor')
    <script type="text/javascript" src="{{ asset('js/vendor/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/vendor/daterangepicker/daterangepicker.min.js') }}"></script>
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

    <div class="agenda-section col-xs-12 bg-grey">
        <div class="container">
            <div class="row">
                <div class="filtros-agenda">
                    {{-- Barra de Filtros --}}

                    <div class="btn-agenda col-xs-12 col-md-3 col-lg-3">
                        <select name="cidade" id="agendas-cidade-select" class="select-agendas">
                            <option value="">Municipio</option>
                            @foreach ($cidades as $cidade)
                                <option value="{{ $cidade }}">{{ $cidade }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="btn-agenda col-xs-12 col-md-6 col-lg-4">
                        <div class="search-form">
                            <div class="search-bar">
                                <input type="text" name="titulo_agenda" id="titulo_agenda" placeholder="Pesquisa" class="custom-search">
                            </div>
                        </div>
                    </div>

                    <div class="btn-agenda col-xs-12 col-md-3 col-lg-3">
                        <input type="text" id="calendarioAgenda" name="date" class="form-control search-date"
                            placeholder="Calendário">
                        <img class="img-form" style="top:10px;pointer-events: none;">
                    </div>

                    <div class="btn-agenda col-xs-6 col-md-6 col-lg-1" style="padding: 0 0 0 15px">
                        <button href="{{ route('page.agenda') }}" type="button" class="button"> Pesquisar </button>
                    </div>

                    <div class="btn-agenda col-xs-6 col-md-6 col-lg-1">
                        <button href="{{ route('page.agenda') }}" type="button" class="button" id="limpar"> Limpar </button>
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
                        <p class="col-xs-12 text-center no-more-agendas" style="display: none;"> Não há mais agendas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var dateFormat = 'DD/MM/YYYY';
        var today = moment(); // Obtém o momento atual

        var config = {
            "autoUpdateInput": false,
            "startDate": today,
            "endDate": today.clone().add(1, 'year'), // Define o valor final como 1 ano após o dia atual
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
            $('.search-date').change();
        });
    </script>
@endsection
