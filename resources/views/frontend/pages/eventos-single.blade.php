@extends('templates.master')

@section('content')
    @include('components.banner-page', [
        'title' => $evento->titulo,
//        'bgPagePath' => !empty(trim($curso->imagem)) ? urlStorage($curso->imagem, 1400, 300) : '',
        'overlay' => false
    ])
    <div class="container">
        <div class="col-xs-12">
            <p class="descricao">{{$evento->texto}}</p>
        </div>
        <div class="col-xs-6">
            <a href="{{ route('page.eventos.inscricao', $evento->slug) }}"><button type="button" class="btn btn-success btn-floating btn-lg">Inscrever-se</button></a>
        </div>
    </div>

@endsection
