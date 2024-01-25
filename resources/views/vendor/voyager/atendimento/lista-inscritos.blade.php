@extends('voyager::master')

@section('content')

    <div class="container">
        <h1 class="text-center">{{$evento->titulo}} - {{$evento->data_inicio}} - {{$evento->data_fim}}</h1>
        <h2>Inscritos</h2>

        <ul class="nav nav-pills text-center" id="myTabs">
            <li class="col-md-6 active" style="padding: 0"><a data-toggle="tab" href="#compareceram">Presentes</a></li>
            <li class="col-md-5" style="padding: 0"><a data-toggle="tab" href="#ausentes">Ausentes</a></li>
        </ul>

        <div class="tab-content">
            <!-- Tab Compareceram -->
            <div id="compareceram" class="tab-pane fade in active">
                @if(count($presentes) > 0)

                    <table id="dataTable" class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <!-- Adicione mais colunas conforme necessário -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($presentes as $presente)
                                <tr>
                                    <td>{{ $presente->nome }}</td>
                                    <td>{{ $presente->cpf }}</td>
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
                                <th>Nome</th>
                                <th>CPF</th>
                                <!-- Adicione mais colunas conforme necessário -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ausentes as $ausente)
                                <tr>
                                    <td>{{ $ausente->nome }}</td>
                                    <td>{{ $ausente->cpf }}</td>
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


@endsection

@section('javascript')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script>

    $(document).ready(function() {
        new DataTable('#dataTable');
    });
</script>
@endsection

