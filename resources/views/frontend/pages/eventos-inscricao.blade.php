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

    <div class="container">
        <h1>Inscrição para o evento: {{ $evento->nome }}</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-site form-licitacao" id="form-evento-incricao">
            @if ($evento->estaCheio())
                <h2 class="text-center">Inscriçoes Encerradas</h3>
            @else
                @include('frontend.forms.inscricao-evento')
            @endif

        </div>
    </div>
@endsection
