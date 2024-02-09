@extends('templates.master')

@section('content')
    <div style="position: relative;">
        <img
        src="{{ !empty(trim($evento->banner)) ? urlStorage($evento->banner) : '' }}"
        class="img-responsive banner-center"
        alt=""
        style="margin: auto">
        @if ($evento->estaCheio())
            <img src="{{ asset('images/InscricoesEncerradas.webp') }}" alt="" style="position: absolute; top: 5%; right: 10%; margin: 20px; max-height: 80%;" class="lotado">
        @endif
    </div>

    <div class="container evento-single">
        <div class="row">

            <div class="col-xs-12" style="margin-bottom: 20px;">
                <div class="page-title center" style="margin-bottom: 0px;"> {!! $evento->titulo !!} </div>
                <div class="page-subtitle text-center">
                    {{ $evento->getAttrDateFromFormat('data_inicio', 'Y-m-d', 'd/m/Y') }}
                    @if ($evento->data_fim)
                        {!! ($evento->data_fim != $evento->data_inicio) ? ' a ' . $evento->getAttrDateFromFormat('data_fim', 'Y-m-d', 'd/m/Y') : '' !!}
                    @endif
                </div>
            </div>

            <div class="col-xs-12">
                <div class="descricao"> {!! $evento->texto !!} </div>
            </div>

            <div class="col-xs-12">
                <!-- Mapa -->
                @if(!empty($evento->local))

                    <div class="col-md-6 bloco-info">
                        <h3 style="color: darkgreen">Local:</h3>
                        {{$evento->local}}
                        <div class="text-center google-maps">
                            {!!$evento->mapa!!}
                        </div>
                    </div>
                @endif

                <!-- Downloads -->
                @if(!empty($evento->download != "[]"))
                    <div class="col-md-6 bloco-info">
                        <div class="text-center">
                            <h3 style="color: darkgreen">Arquivos Disponíveis:</h3>
                            <h4><a href="{{ asset($evento->download) }}" download="{{ $evento->download }}">Especicação do Evento</a></h4>
                        </div>
                    </div>
                @endif

                <!-- Link -->
                @if(!empty($evento->link))
                    <div class="col-md-6 bloco-info">
                        <div class="text-center">
                            <h3 style="color: darkgreen">Mais informações: </h3>
                            <h4> {!! $evento->link !!} </h4>
                        </div>
                    </div>
                @endif

                <div class="col-xs-12" style="padding-top: 20px">
                    @if ($evento->estaCheio())
                        <a href="{{ route('page.eventos.inscricao', $evento->slug) }}"><button type="button" class="btn btn-success btn-floating btn-lg" disabled>Evento Lotado</button></a>
                    @else
                        <a href="{{ route('page.eventos.inscricao', $evento->slug) }}"><button type="button" class="btn btn-success btn-floating btn-lg">Inscrever-se</button></a>
                    @endif
                </div>

            </div>
        </div>
    </div>

@endsection

