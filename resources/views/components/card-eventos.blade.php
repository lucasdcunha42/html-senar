<section>
	<div class="container py-2">
		<article class="postcard light green">
			<a class="postcard__img_link" href="{{route('page.eventos.single', $evento->slug)}}">
				<img class="postcard__img img-responsive" src="{{urlStorage($evento->card, 300, 300)}}" alt="Image Title" />
                @if ($evento->estaCheio())
                    <img src="{{ asset('images/InscricoesEncerradas.webp') }}" style="position: absolute; height: 75%; top: 10%; left: 50px">
                @endif
			</a>


			<div class="postcard__text t-dark">
				<h1 class="postcard__title green"><a href="{{route('page.eventos.single', $evento->slug)}}">{{$evento->titulo}}</a></h1>
				<div class="postcard__subtitle">
					<time datetime="2020-05-25 12:00:00">
						<i class="fas fa-calendar-alt mr-2"></i>
                        {{ $evento->getAttrDateFromFormat('data_inicio', 'Y-m-d', 'd/m/Y') }}
                        @if ($evento->data_fim)
                            {!! ($evento->data_fim != $evento->data_inicio) ? ' a ' . $evento->getAttrDateFromFormat('data_fim', 'Y-m-d', 'd/m/Y') : '' !!}
                        @endif
                    </time>
				</div>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt">
                    <?php
                        $paragrafos = explode("\n", $evento->texto);
                        echo isset($paragrafos[0]) ? $paragrafos[0] : '';
                    ?>
                </div>
				<ul class="postcard__tagbox">
					<li class="tag__item">
                        <i class="fas fa-clock mr-2"></i>
                        @if ($evento->estaCheio())
                            <span style="color: white;">Evento Lotado</span>
                        @else
                            <a href="{{ route('page.eventos.inscricao', $evento->slug) }}"> Inscrever-se </a>
                        @endif
                    </li>
					<li class="tag__item play green">
						<a href="{{ route('page.eventos.single', $evento->slug) }}"><i class="fas fa-play mr-2"></i> Ver Mais... </a>
					</li>
				</ul>
            </div>
		</article>
    </div>
</section>


