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
                    {!! ($evento->data_fim != $evento->data_inicio) ? ' á ' . $evento->getAttrDateFromFormat('data_fim', 'Y-m-d', 'd/m/Y') : '' !!}
                </div>
            </div>

            <div class="col-xs-12">
                <div class="descricao"> {!! $evento->texto !!} </div>
            </div>

            @if(!empty($evento->local))
                <div class="col-xs-12">
                    <div class="col-md-6 bloco-info">
                        <h3 style="color: darkgreen">Local:</h3>
                        {{$evento->local}}
                        <div class="text-center google-maps">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3454.036325418528!2d-51.2218304!3d-30.0358157!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9519790085a8c86d%3A0xe728e39df096c68e!2sSENAR-RS%20(Servi%C3%A7o%20Nacional%20de%20Aprendizagem%20Rural)!5e0!3m2!1spt-BR!2sbr!4v1706554193092!5m2!1spt-BR!2sbr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    @if($evento->download != "[]")
                        <div class="col-md-6">
                            <div class="text-center">
                                <h3 style="color: darkgreen">Arquivos Disponiveis:</h3>
                            </div>

                                <div class="col-md-6 bloco-info">
                                    <h3 style="color: darkgreen">Arquivos:</h3>
                                    {{ $evento->download }}
                                </div>
                            @endif
                        </div>
                    @endif
                </div>


            @if( $evento->download != "[]" || !empty($evento->link))

                <div class="col-md-12">

                    @if(!empty($evento->download))
                        <div class="col-md-6 bloco-info">
                            {{ $evento->link }}
                        </div>
                    @endif
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

@endsection

