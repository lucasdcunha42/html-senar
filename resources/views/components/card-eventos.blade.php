<section class="light">
	<div class="container py-2">
		<article class="postcard light green">
			<a class="postcard__img_link" href="{{route('page.eventos.single', $evento->slug)}}">
				<img class="postcard__img" src="https://picsum.photos/500/501" alt="Image Title" />
			</a>
			<div class="postcard__text t-dark">
				<h1 class="postcard__title green"><a href="{{route('page.eventos.single', $evento->slug)}}">{{$evento->titulo}}</a></h1>
				<div class="postcard__subtitle small">
					<time datetime="2020-05-25 12:00:00">
						<i class="fas fa-calendar-alt mr-2"></i>{{$evento->data_inicio}}
					</time>
				</div>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt"> {{$evento->texto}}</div>
				<ul class="postcard__tagbox">
					<li class="tag__item"><i class="fas fa-clock mr-2"></i>Inscrever-se</li>
					<li class="tag__item play green">
						<a href="#"><i class="fas fa-play mr-2"></i>Ver Mais...</a>
					</li>
				</ul>
			</div>
		</article>
    </div>
</section>


