@if(isset($bgPagePath) && $bgPagePath)
<div class="banner-page" style="background-image: url({{ $bgPagePath }})">
@else
<div class="banner-page" style="background-image: url('{{ asset('images/bg-cinza.png') }}')">
@endif
    @if(isset($overlay) && $overlay)
        <div class="bg-overlay"></div>
    @endif
    @if(isset($title) || isset($duration))
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    @if(isset($title))
                        <div class="banner-title">
                            {!! $title !!}
                        </div>
                    @endif
                    @if(isset($duration))
                        <div class="curso-duration">
                            DURAÇÃO:{{ $duration }} <span>h</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
