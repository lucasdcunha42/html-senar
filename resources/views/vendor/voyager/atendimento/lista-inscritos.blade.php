@extends('voyager::master')

@section('content')

    <div class="container">
        <h1 class="text-center">{{$evento->titulo}} - {{$evento->getAttrDateFromFormat('data_inicio', 'Y-m-d', 'd/m/Y')}} - {{$evento->getAttrDateFromFormat('data_fim', 'Y-m-d', 'd/m/Y')}}</h1>
        <h2>Inscritos</h2>

        <ul class="nav nav-pills text-center" id="myTabs">
            <li class="col-xs-3" style="padding: 0"><a data-toggle="tab" href="#compareceram">Presentes</a></li>
            <li class="col-xs-4 active" style="padding: 0"><a data-toggle="tab" href="#ausentes">Ausentes</a></li>
            <li class="col-xs-4" style="padding: 0;"><a data-toggle="tab" href="#adicionar">Adicionar</a></li>
        </ul>


        <div class="tab-content">
            <!-- Tab Compareceram -->
            <div id="compareceram" class="tab-pane fade">
                @if(count($presentes) > 0)

                    <table class="table">
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
            <div id="ausentes" class="tab-pane fade in active table-responsive">
                @if(count($ausentes) > 0)

                    <table id="dataTable" class="table stripe" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th> Presença </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ausentes as $ausente)
                                <tr>
                                    <td>{{ $ausente->nome }}</td>
                                    <td>{{ $ausente->cpf }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('atendente.presenca', ['evento' => $evento->id, 'inscrito' => $ausente->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Presente</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Nenhum inscrito está ausente.</p>
                @endif
            </div>

            <div id="adicionar" class="tab-pane fade">
                <h2>Adicionar Novo Inscrito</h2>
                <form method="POST" action="{{ route('atendente.store') }}">
                    @csrf
                    <input type="hidden" name="evento_id" value="{{ $evento->id }}">
                    <div class="form-group">
                        <label for="nome">Nome Completo: <span class="small" style="color:#C0C0C0">( obrigatório )</span></label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF:</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="atividade"> Atividade: </label>
                        <input type="atividade" name="atividade" id="atividade" class="form-control" value="{{ old('atividade') }}">
                    </div>

                    <div class="form-group">
                        <label for="cidade">Municipio: <span class="small" style="color:#C0C0C0">( obrigatório )</span></label>
                        <select name="cidade" id="cidade" class="form-control" required>
                            <option value="{{ old('cidade') }}" disabled selected>Selecione um município</option>
                            @foreach($cidades as $id => $cidade)
                                <option value="{{ $cidade }}" {{ old('cidade') == $id ? 'selected' : '' }}>
                                    {{ $cidade }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input type="telefone" name="telefone" id="telefone" class="form-control" value="{{ old('telefone') }}">
                    </div>
                    <!-- Adicione mais campos conforme necessário -->
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </form>
            </div>

        </div>
    </div>


@endsection

@section('javascript')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script>

    $(document).ready(function() {

        $('#dataTable').DataTable({
            "language": {
                "search": "",
                "searchPlaceholder": "Digite sua pesquisa..."
            },
            "paging": false

        });
    });

</script>
@endsection

@section('css')

<style>
    .dataTables_filter {
        position: relative;
    }

    .dataTables_filter input {
        width: 65vw;
        height: 32px;
        background: #fcfcfc;
        border: 1px solid #aaa;
        border-radius: 5px;
        box-shadow: 0 0 3px #ccc, 0 10px 15px #ebebeb inset;
        text-indent: 10px;
    }

    .dataTables_filter .fa-search {
        position: absolute;
        top: 10px;
        left: auto;
        right: 10px;
    }
</style>
@endsection

