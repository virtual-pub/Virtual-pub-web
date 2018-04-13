<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <link rel="shortcut icon" href="{{ asset('images/laravel.ico') }}">
        <style>
            html, body {
                background-color: #f0f0f0;
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
            .menu-logo{
                filter: contrast(0);
                
            }
        </style>
    </head>
    <body>
        <div class="section">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Dashboard</a>
                    @else
                        <a href="{{ route('social.login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                  <img src=" {{ asset('images/logo.svg') }}" width="1400px" alt="" class="img-responsive menu-logo">
                </div>

                <p class="meta">
                    Virtal-Pub | Rede social de Cervejas artesanais
                </p>
                <div class="links">
                    <a href="https://github.com/virtual-pub/Virtual-pub-web/" target="_blank">Visite o Github do projeto</a>
                </div>
            </div>
            </div>

            <div class="container-fluid">
                <div class="row centered">
                    <div class="col-sm-12 col-md-4">
                    teste
                    </div>
                    <div class="col-sm-12 col-md-4">
                    teste
                    </div>
                    <div class="col-sm-12 col-md-4">
                    teste
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
