@if(isset($bgPagePath) && $bgPagePath)
<div class="banner-agenda" style="background-image: url({{ $bgPagePath }})">
@else
<div class="banner-agenda" style="background-image: url('{{ asset('images/bg-cinza.png') }}')">
@endif
    <div class="bg-overlay"></div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                <div class="agenda-title col-xs-12">
                    {!! $agenda->nome_curso !!}
                </div>

                <div class="banner-info col-xs-12">

                    <div class="info-box col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        Carga Horária: <br> {{ $agenda->curso->cargahorariatotal }}h
                    </div>

                    <div class="info-box col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        Municipio:<br>
                        {{ $agenda->nome_municipio }}
                    </div>

                    <div class="info-box col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        Início:<br>
                        {{ \Carbon\Carbon::parse($agenda->data_inicio)->format('d/m/Y') }}
                    </div>

                    <div class="info-box col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        Término:<br>
                        {{ \Carbon\Carbon::parse($agenda->data_fim)->format('d/m/Y') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
