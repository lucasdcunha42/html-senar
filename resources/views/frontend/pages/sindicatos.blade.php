@extends('templates.master')

@section('content')

    @php
        $pageVars = [];

        if($page && !empty(trim($page->banner))) {
            $pageVars['bgPagePath'] = urlStorage($page->banner, 1400, 300);
        }

    @endphp

    @include('components.banner-page', $pageVars)

    <div class="programas-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="page-title center">
                        {{ $page->titulo }}
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="container-90-per-cent">
                        <div class="page-description">
                            {!! $page->texto !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sindicatos search-selects">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="container-selects">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="select-item">
                                    @php
                                        $arrMunicipios = [];
                                    @endphp
                                    <label for="">Buscar sindicato por município:</label>
                                    <select id="municipios" class="custom-select">
                                        <option value="">Escolha</option>
                                        @foreach ($municipios as $municipio)
                                            @if(in_array($municipio->municipio, $arrMunicipios))
                                                @continue
                                            @endif
                                            @php
                                                $arrMunicipios[] = $municipio->municipio;
                                            @endphp
                                            <option
                                                value="{{ $municipio->municipio }}">
                                                {{ $municipio->municipio }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="select-item">
                                    <label for="">Selecionar sistema:</label>
                                    <select id="sistema" class="custom-select">
                                        <option value="">Escolha</option>
                                        <option value="farsul">Farsul</option>
                                        <option value="fetag">Fetag</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="resultados">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h6 class="page-title center">
                        Resultados
                    </h6>
                </div>
                <div class="col-xs-12">
                    {{-- <div class="resultados-lista container-90-per-cent clearfix">
                        <div class="resultado-item">
                            <div class="label">Nome</div>
                            <div class="value">SR - Sindicato Rural de Alegrete</div>
                        </div>
                        <div class="resultado-item">
                            <div class="label">Telefone</div>
                            <div class="value">(55) 4343-3434</div>
                        </div>
                        <div class="resultado-item">
                            <div class="label">E-mail</div>
                            <div class="value">sra.cursos@terra.com.br</div>
                        </div>
                    </div> --}}
                    <div class="sindicato-results">
                        <div class="table-responsive">
                            <table class="table table-bordered table-site">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Telefone</th>
                                        <th>E-mail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sindicatos as $sindicato)
                                        <tr
                                            data-id="{{ $sindicato->id }}"
                                            data-sistema="{{ strtolower($sindicato->sistema) }}"
                                            data-municipio="{{ $sindicato->getMunicipios() }}">
                                            <td>{{ $sindicato->nome }}</td>
                                            <td>{{ $sindicato->telefones }}</td>
                                            <td>{{ $sindicato->email }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
