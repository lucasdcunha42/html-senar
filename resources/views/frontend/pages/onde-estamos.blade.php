@extends('templates.master')

@section('content')

    @php
        $pageVars = [];

        if($page && !empty(trim($page->banner))) {
            $pageVars['bgPagePath'] = urlStorage($page->banner, 1400, 300);
        }

    @endphp

    @include('components.banner-page', $pageVars)

    <div class="arrecadacao-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="page-title center">
                        {{ $page->titulo }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="onde-estamos search-section bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <div class="html">
                        {!! $page->texto !!}
                    </div>

                    <div class="selects-container">
                        <div class="row">
                            <div class="col-lg-offset-4 col-lg-4">
                                <select name="regioes" class="custom-select bg-white">
                                    <option value="">Busque pela região</option>
                                    @foreach ($regioes as $key => $regiao)
                                        <option value="{{ $key }}">{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-offset-4 col-lg-4">
                                <select name="cidades" class="custom-select bg-white">
                                    <option value="">Busque pelo município</option>
                                    @foreach ($cidades as $key => $cidade)
                                        @php
                                            $regiao = optional($cidade->first())->regiao ?? '-';
                                        @endphp
                                        <option
                                            data-regiao="{{ $regiao }}"
                                            value="{{ $key }}">
                                                {{ $key }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="onde-estamos table-results">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-site">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all as $infos)
                                    <tr class="hide-on-load" data-regiao="{{ $infos->regiao }}" data-cidade="{{ $infos->cidade }}">
                                        <td>{{ $infos->supervisor_nome }}</td>
                                        <td>{{ $infos->supervisor_email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
