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
        <div class="col-xs-12">
            <div class="data col-xs-12 col-sm-6">
                <p class="local"> Local: {{$evento->cidade}} - {{$evento->estado}} </p>
                <p class="descricao"> Inicio em: {{$evento->data_inicio}} </p>
                <p class="Programação"> Programação: {{$evento->data_inicio}} </p>
            </div>

            <div class="local col-xs-12 col-sm-6">
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13816.145301674112!2d-51.2218304!3d-30.0358157!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9519790085a8c86d%3A0xe728e39df096c68e!2sSENAR-RS%20(Servi%C3%A7o%20Nacional%20de%20Aprendizagem%20Rural)!5e0!3m2!1spt-BR!2sbr!4v1701977653128!5m2!1spt-BR!2sbr"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                 </div>
            </div>
        </div>
    </div>

@endsection
