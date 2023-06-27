@extends('templates.master')

@section('content')

    @php
        $pageVars = [];

        if($page && !empty(trim($page->banner))) {
            $pageVars['bgPagePath'] = urlStorage($page->banner, 1400, 300);
        }
    @endphp

    @include('components.banner-page', $pageVars)

    <div class="o-senar-section">
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
            <div class="row">
                <div class="col-xs-12">
                    <div class="supervisao-itens-list">
                        @foreach($supervisoes->chunk(3) as $row)
                            <div class="row">
                                @foreach($row as $key => $supervisao)
                                    @php
                                        $supervisao = $supervisao->first();

                                        if(!$supervisao) {
                                            continue;
                                        }

                                    @endphp
                                    <div class="col-sm-4">
                                        <div class="supervisao-item">
                                            <div class="supervisao-item__header">
                                                <h6>{{ $key }}</h6>
                                            </div>
                                            <div class="supervisao-item__body">
                                                <div class="d-table">
                                                    <div class="d-table-cell">
                                                        <h4>{{ $supervisao->supervisor_nome }}</h4>
                                                        <p class="email">
                                                            {{ $supervisao->supervisor_email }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
