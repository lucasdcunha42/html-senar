@if($composeAgenda->isNotEmpty())
    <div class="agenda" style="background-image: url('{{ imgSetting('geral.bg-agenda-home') }}')">

        <div class="container">

            <div class="row">
                <div class="col-xs-12">
                    <h3 class="page-title center">
                        Agenda
                    </h3>
                </div>
            </div>

            <div class="row">
                @foreach($composeAgenda as $evento)
                    <div class="col-sm-4 col-md-3">
                        @include('components.c-thumb-4', ['evento' => $evento])
                    </div>
                @endforeach
            </div>

        </div>

        <div class="see-more">
            <a href="{{ route('page.agenda') }}">Veja a Agenda Completa</a>
        </div>

    </div>
@endif
