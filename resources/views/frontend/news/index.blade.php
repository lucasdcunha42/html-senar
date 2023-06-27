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

    <div class="noticias-filters">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="noticias-filter-buttons">
                        <div class="btn-noticias">
                            <button>Notícias</button>
                        </div>
                        <div class="btn-noticias">
                            <button>Boletim de Rádio</button>
                        </div>
                        <div class="btn-noticias">
                            <input type="text" name="date" class="form-control search-date">
                            <img
                                class="img-form"
                                style="width: 20px;top:10px;"
                                data-route="{{ url()->current() }}"
                                src="{{ asset('images/icon-calendar.png') }}" alt="">
                        </div>
                        <div class="btn-noticias">
                            <input type="text" name="busca" class="form-control search-text">
                            <img
                                class="img-form"
                                data-route="{{ url()->current() }}"
                                src="{{ asset('images/icon-search.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($noticias->isNotEmpty())
        <div class="noticias-list">
            <div class="container" data-auto-load="{{ $startAutoLoadObject }}">
                @include('frontend.news.load-more', ['noticias' => $noticias])
            </div>
            <div class="container text-right counter">
                <b>
                    <span class="current-count">{{ $noticias->count() }}</span>
                    <span class="of-count">de</span>
                    <span class="total-count">{{ $total }}</span>
                </b>
            </div>
            <div class="loading-container text-center">
                <img src="{{ asset('images/loading.gif') }}" alt="">
            </div>
        </div>
    @endif

@endsection

@section('js')
    <script>

        var dateFormat = 'DD/MM/YYYY';

        var config = {
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

        var inputSelector = 'input[name="date"]';
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
