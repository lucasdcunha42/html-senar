@extends('templates.master')

@section('content')
    <img
        src="{{ !empty(trim($evento->banner)) ? urlStorage($evento->banner) : '' }}"
        class="img-responsive banner-center"
        alt=""
        style="margin: auto">

    <div class="container">

        <div class="col-xs-12" style="margin-bottom: 20px;">
            <div class="page-title center" style="margin-bottom: 0px;"> {!! $evento->titulo !!} </div>
            <div class="page-subtitle text-center">
                {{ $evento->getAttrDateFromFormat('data_inicio', 'Y-m-d', 'd.m.Y') }}
                {!! ($evento->data_fim != $evento->data_inicio) ? ' á ' . $evento->getAttrDateFromFormat('data_fim', 'Y-m-d', 'd.m.Y') : '' !!}
            </div>
        </div>

        <div class="col-xs-12">
            <div class="descricao"> {!! $evento->texto !!} </div>
        </div>

        <div class="col-xs-12">
            <a href="{{ route('page.eventos.inscricao', $evento->slug) }}"><button type="button" class="btn btn-success btn-floating btn-lg">Inscrever-se</button></a>
        </div>

        <div class="row">
            <div class="col-md-6">
                Texto
            </div>

            <div class="col-md-6">
                texto
            </div>
        </div>

    </div>

@endsection
