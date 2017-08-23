<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/sweetalert.css">
    <script src="/js/sweetalert.min.js"></script>

    <style>
        html, body {
            background-color: #313131;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
            z-index: 999;
        }

        .position-ref {
            position: relative;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        #particles-js {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 99%;
        }

        .btn-primary {
            color: #fff;
            background-color: #3ec1be;
            border-color: #47e0dc;
        }
        .btn-primary:hover {
            color: #fff;
            background-color: #30adaa;
            border-color: #47e0dc;
        }


    </style>
</head>
<body>
    <div id="app">
        <div class="flex-center position-ref full-height">
            @yield('content')
        </div>

        <div id="particles-js"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS.load('particles-js', '{{ asset('js/particlesjs.json') }}', function() {
            console.log('callback - particles.js config loaded');
        });
    </script>

    @include('sweet::alert')
</body>
</html>
