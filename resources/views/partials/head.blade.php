<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png" />

    @yield('stylesheet')

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('jquery-ui/jquery-ui.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('jquery-datetimepicker/jquery.datetimepicker.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('jquery-daterangepicker/daterangepicker.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('owl.carousel/css/owl.carousel.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('owl.carousel/css/owl.theme.default.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/signin.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/catalogue.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}" type="text/css" />

    <noscript>
        <link rel="stylesheet" href="{{ asset('css/noscript.css') }}" />
    </noscript>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Google tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-252441480-1"></script>
    <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-252441480-1');
    </script>
</head>
