<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
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
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
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

            .m-b-md {
                margin-bottom: 30px;
            }

            @import url('https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,700,900');

            html, body {
                height: 100%;
                width: 100%;
            }

            body {
                background-attachment: fixed;
                background-image: url({{ asset("img/bg_black.jpg") }});
                background-size: cover;
                background-repeat: no-repeat;
                font-family: "Roboto", "Hans Kendrick", sans-serif;
            }

            .container {
                margin: 0 auto;
                width: 50%;
                text-align: center;
            }

            .container img {
                margin-top: 60px;
                max-width: 200px;
            }

            h1 {
                color: #5ff4f0;
                font-weight: 200;
                font-size: 48px;
                letter-spacing: 0.10em;
            }

            .highlight {
                color: #29d7d1;
            }

            h2 {
                color: #ffffff;
                font-weight: 200;
                font-size: 32px;
                letter-spacing: 0.10em;
            }

            p {
                color: #00d3d0;
                font-weight: 200;
                font-size: 28px;
                letter-spacing: 0.10em;
                margin-top: 10px;
                margin-bottom: 40px;
            }

            .teal-spacer {
                height: 4px;
                width: 149px;
                background-color: #00d3d0;
                border-radius: 5px;
                margin: 0 auto;
                margin-top: 50px;
                margin-bottom: 50px;
            }

            ul li a {
                color: #ffffff;
                text-decoration: underline;
                -webkit-text-decoration-color: #00d3d0;
                text-decoration-color: #00d3d0;
                font-size: 28px;
                font-weight: 200;
            }

            ul {
                list-style: none;
                padding: 0 0 0 0px;
            }

            ul li {
                margin-bottom: 30px;
                letter-spacing: 0.10em;
            }

            a {
                -webkit-transition: all 0.3s;
                -moz-transition: all 0.3s;
                transition: all 0.3s;
            }

            a:after {
                position: absolute;
                z-index: 999;
                -webkit-transition: all 0.4s;
                -moz-transition: all 0.4s;
                transition: all 0.4s;
            }

            a:hover,
            a:active {
                text-decoration: none;
                color: #00d3d0;
            }

            @media only screen and (max-device-width: 768px){
                .container {
                    width: 90%;
                }

                .container img {
                    margin-top: 100px;
                    max-width: 500px;
                }

                h1 {
                    font-size: 128px;
                }

                h2 {
                    margin-top: -60px;
                    font-size: 76px;
                }


                p {
                    font-size: 56px;
                    margin-top: 20px;
                    margin-bottom: 50px;
                }

                .teal-spacer {
                    height: 8px;
                    width: 375px;
                }

                ul li a {
                    font-size: 56px;
                }

                ul li {
                    margin-bottom: 50px;
                }
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/dashboard') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @endif
                </div>
            @endif
            <div class="content container">
                <img src="{{ asset('img/xby_logo.png') }}" alt="XTRABYTES LOGO">
                <h1>XTRA<span class="highlight">BYTES</span></h1>
                <h2>new website launching soon</h2>
                <div class="teal-spacer"></div>
                <p>Join Us</p>
                <ul>
                    <li><a target="_blank" href="https://xtrabytes.herokuapp.com/">slack</a></li>
                    <li><a target="_blank" href="https://bitcointalk.org/index.php?topic=1864397.0">bitcointalk</a></li>
                    <li><a target="_blank" href="https://twitter.com/xtrabytes">twitter</a></li>
                    <li><a target="_blank" href="https://www.facebook.com/XtraBYtesOfficial/">facebook</a></li>
                    <li><a target="_blank" href="https://www.reddit.com/r/XtraBYtes/">reddit</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>
