<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach($__banners as $key => $__banner)
            @php $c = $loop->first ? 'active' : ''; @endphp

            @if($__banners->count() == 1)
                @break
            @endif
            <li
                data-target="#carousel-example-generic"
                data-slide-to="{{$key}}"
                class="{{$c}}">
            </li>
        @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @foreach($__banners as $key => $__banner)
            @php $c = $loop->first ? ' active' : ''; @endphp

            @if(empty(trim($__banner->link)))
                <div class="item{{$c}}">
            @else
                <div class="item{{$c}}" data-link="{{ $__banner->link }}">
            @endif

                <img
                    src="{{ asset('storage/' . $__banner->Imagem) }}"
                    class="img-responsive"
                    alt="">

                @if($__banner->hasTitleOrSubtitle())
                    <div class="carousel-caption">
                        {!! $__banner->getTitle() !!}
                        {!! $__banner->getSubTitle() !!}
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Controls -->
    {{-- <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a> --}}

</div>
