@extends('templates.master')

@section('content')
    @include('components.banner-page', [
        'bgPagePath' => !empty(trim($evento->banner)) ? urlStorage($evento->banner, 1400, 300) : '',
        'overlay' => false
    ])
    <div class="container">

        <div class="col-xs-12">
            <div class="page-title center"> {!! $evento->titulo !!} </div>
        </div>

        <div class="col-xs-12">
            <div class="descricao"> {!! $evento->texto !!} </div>
        </div>

        <div class="col-xs-6">
            <a href="{{ route('page.eventos.inscricao', $evento->slug) }}"><button type="button" class="btn btn-success btn-floating btn-lg">Inscrever-se</button></a>
        </div>
    </div>

@endsection
