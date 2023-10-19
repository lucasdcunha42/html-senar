@extends('templates.master')
@section('content')
    @include('components.banner-agenda', [
        'bgPagePath' => !empty(trim($agenda->curso->imagem)) ? urlStorage($agenda->curso->imagem, 1400, 300) : '',
    ])

    <div class="como-participar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>COMO <br> PARTICIPAR</h6>
                            <p>São necessários</p>
                        </div>

                        <div class="col-sm-6">
                            <div class="course-requires">
                                @if(!empty(trim($agenda->curso->escolaridade)))
                                <div class="required-item">
                                    <img src="{{ asset('images/icons/pencil.png') }}" alt="">
                                    <span class="fw-bold">Escolaridade:</span> <span>{{ $agenda->curso->escolaridade }}</span>
                                </div>
                                @endif
                                @if(!empty(trim($agenda->curso->idade)))
                                <div class="required-item">
                                    <img src="{{ asset('images/icons/singleman.png') }}" alt="">
                                    <span class="fw-bold">Idade:</span> <span>{{ $agenda->curso->idade }}</span>
                                </div>
                                @endif
                                @if(!empty(trim($agenda->curso->minimodeparticipantes)))
                                <div class="required-item">
                                    <img src="{{ asset('images/icons/upleft.png') }}" alt="">
                                    <span class="fw-bold">Mínimo de participantes:</span> <span>{{ $agenda->curso->minimodeparticipantes }}</span>
                                </div>
                                @endif
                                @if(!empty(trim($agenda->curso->maximodeparticipantes)))
                                <div class="required-item">
                                    <img src="{{ asset('images/icons/upr.png') }}" alt="">
                                    <span class="fw-bold">Máximo de participantes:</span> <span>{{ $agenda->curso->maximodeparticipantes }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Sindicatos --}}
    <div class="sindicato">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                            <div class="sindicato-item">
                                <span class="fw-bold"> {{$agenda->municipio->sindicato->nome}} </span> <span></span><br>
                                <span class="fw-bold">Contato: </span> <span>{{$agenda->municipio->sindicato->telefones}}</span><br>
                                <span class="fw-bold">Email: </span> <span>{{$agenda->municipio->sindicato->email}}</span>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if(!empty(trim($agenda->curso->conteudoprogramatico)))
    <div class="conteudo-programatico curso-single">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h5 class="page-subtitle">Conteúdo Programático</h5>
                </div>
                <div class="col-xs-12">
                    <div class="auto-width html">
                        {!! $agenda->curso->conteudoprogramatico !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @include('frontend.partials.agenda')

    @if($agenda->curso->depoimentos->isNotEmpty())
        <div class="depoimentos depoimentos-cursos text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="page-title center">
                            Depoimentos
                        </h3>
                    </div>
                    <div class="col-xs-12">
                        <div class="depoimentos-carousel">
                            @foreach($agenda->curso->depoimentos as $depoimento)
                            <div>
                                <p class="quote">"</p>
                                {!! $depoimento->texto !!}
                                <p class="quote">"</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
