@extends('voyager::master')

@section('content')
    <div class="container">
        <h1>Inscritos</h1>

        <ul class="nav nav-tabs" id="myTabs">
            <li class="active"><a data-toggle="tab" href="#compareceram">Compareceram</a></li>
            <li><a data-toggle="tab" href="#ausentes">Ausentes</a></li>
        </ul>

        <div class="tab-content">
            <!-- Tab Compareceram -->
            <div id="compareceram" class="tab-pane fade in active">
                @if(count($compareceram) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <!-- Adicione mais colunas conforme necessário -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($compareceram as $inscrito)
                                <tr>
                                    <td>{{ $inscrito->id }}</td>
                                    <td>{{ $inscrito->nome }}</td>
                                    <td>{{ $inscrito->email }}</td>
                                    <!-- Adicione mais colunas conforme necessário -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Nenhum inscrito compareceu.</p>
                @endif
            </div>

            <!-- Tab Ausentes -->
            <div id="ausentes" class="tab-pane fade">
                @if(count($ausentes) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <!-- Adicione mais colunas conforme necessário -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ausentes as $inscrito)
                                <tr>
                                    <td>{{ $inscrito->id }}</td>
                                    <td>{{ $inscrito->nome }}</td>
                                    <td>{{ $inscrito->email }}</td>
                                    <!-- Adicione mais colunas conforme necessário -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Nenhum inscrito está ausente.</p>
                @endif
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#myTabs a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');
            });
        });
    </script>
@endsection
