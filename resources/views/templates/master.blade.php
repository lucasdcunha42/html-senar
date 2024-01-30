<!DOCTYPE html>
<html lang="en">
<head>


<script type="text/javascript">
    var root = "http://www.senar-rs.com.br/";

    /* Google Analytics */
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'G-29YF015CWZ']);
    _gaq.push(['_trackPageview']);
    (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>

<script type="text/javascript" async="" src="http://www.google-analytics.com/ga.js"></script>

<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1435749543520095');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1435749543520095&ev=PageView&noscript=1"/></noscript>
<!-- End Meta Pixel Code -->


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Senar RS</title>

    <script>
        var base_url = "{{ url('/') }}";
    </script>

    @php
        $timestamp = (new DateTime())->getTimestamp();
    @endphp

    <link rel="stylesheet" href="{{ asset('css/bootstrap-3.4.1-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/vendor/slick-1.8.1/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('js/vendor/slick-1.8.1/slick/slick-theme.css') }}">
    @yield('css-vendor')
    <link rel="stylesheet" href="{{ asset('css/app.css?t=' . $timestamp) }}">
    @yield('css')



</head>
<body>

    <div class="wrapper">

        @include('frontend.structure.header')
        @include('frontend.structure.side-menu')

        @yield('content')

        @include('frontend.structure.footer')

    </div>


    <script src="{{ asset('js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-migrate.1.4.1.min.js') }}"></script>
    <script src="{{ asset('css/bootstrap-3.4.1-dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/slick-1.8.1/slick/slick.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js" integrity="sha256-u7MY6EG5ass8JhTuxBek18r5YG6pllB9zLqE4vZyTn4=" crossorigin="anonymous"></script>

    @yield('js-vendor')
    <script src="{{ asset('js/app.js?t=' . $timestamp) }}"></script>
    @yield('js')
</body>
</html>
