@if($__cursos->isNotEmpty())
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
            @foreach($__cursos as $evento)
            {{ddd($__cursos);}}
                <div class="col-sm-4 col-md-3 curso-item">
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
