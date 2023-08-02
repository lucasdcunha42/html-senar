    <div class="agenda" style="background-image: url('{{ imgSetting('geral.bg-agenda-home') }}')">

        <div class="container">

            <div class="row">
                <div class="col-xs-12">
                    <h3 class="page-title center">
                        Proximas agendas do Curso
                    </h3>
                </div>
            </div>

            <div class="row">
                @forelse($proximasAgendas as $evento)
                    <div class="col-sm-4 col-md-3">
                        @include('components.c-thumb-4', ['evento' => $evento])
                    </div>
                @empty
                    <h3 class="page-subtitle-center" style="color: white">
                        Infelizmente não há agendas proximas para este curso
                    </h3>
                @endforelse
            </div>

        </div>

        <div class="see-more">
            <a href="{{ route('page.agenda') }}">Veja a Agenda Completa</a>
        </div>

    </div>
