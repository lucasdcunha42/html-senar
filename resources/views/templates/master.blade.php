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

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-29YF015CWZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-29YF015CWZ', { 'debug_mode':true });
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TWJF9K34');</script>
<!-- End Google Tag Manager -->

<!-- Hotjar Tracking Code for https://www.senar-rs.com.br/ -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:3646631,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>

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
    @yield('js-vendor')
    <script src="{{ asset('js/app.js?t=' . $timestamp) }}"></script>
    @yield('js')
</body>
</html>
