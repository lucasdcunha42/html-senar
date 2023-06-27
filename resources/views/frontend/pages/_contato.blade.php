@extends('templates.master')

@section('content')

    @php
        $pageVars = [];

        if($page && !empty(trim($page->banner))) {
            $pageVars['bgPagePath'] = urlStorage($page->banner, 1400, 300);
        }
    @endphp

    @include('components.banner-page', $pageVars)

    @if($page)
        <div class="contato-section">
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
                        <div class="page-description">
                            {!! $page->texto !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="contato-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-contato-container">
                        <div class="form-site">
                            <form action="{{ route('form.contato') }}" method="post">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            @include('frontend.forms.select-assunto')
                                        </div>
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                name="nome"
                                                placeholder="NOME"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                name="email"
                                                placeholder="E-MAIL"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-2 col-sm-3">
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                name="ddd"
                                                placeholder="(51)"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-10 col-sm-9">
                                        <div class="form-group">
                                        <input
                                            type="text"
                                            name="telefone"
                                            placeholder="TELEFONE"
                                            class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <select
                                                name="estado"
                                                data-old="{{ old('estado', '') }}"
                                                class="custom-select state-select">
                                                <option value="">ESTADO</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select
                                                name="cidade"
                                                data-old="{{ old('cidade', '') }}"
                                                class="custom-select city-select">
                                                <option value="">CIDADE</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="comentario" rows="4" class="form-control" placeholder="COMENTÁRIO"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <button class="btn-submit" type="submit">ENVIAR</button>
                                        <img src="{{ asset('images/loading.gif') }}" class="hide-on-load" alt="">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
