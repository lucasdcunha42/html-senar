@extends('templates.master')

@section('content')
    @include('components.banner-page', [
        'title' => $evento->titulo,
//        'bgPagePath' => !empty(trim($curso->imagem)) ? urlStorage($curso->imagem, 1400, 300) : '',
        'overlay' => false
    ])

    <div class="container">
        <h1>Inscrição para o evento: {{ $evento->nome }}</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
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

        <form action="{{ route('page.eventos.inscricao.store', ['slug' => $evento->slug]) }}" method="post">
            @csrf

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" class="form-control" value="{{ old('cpf') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <!-- Resto dos dados aqui pai -->

            <button type="submit" class="btn btn-primary">Inscrever-se</button>
        </form>
    </div>
@endsection
