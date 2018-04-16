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
    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}">
    <style>
        html,
        body {
            background-color: #f0f0f0;
            color: #ffffff;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;

            margin: 0;
        }

        .full-height {}

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

        .links>a {
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

        .menu-logo {
            filter: contrast(0);
            margin-top:30px;

        }

        .backwhite {
            background-color: #fff;
        }

        .thumbreset {
            border: none;
            background-color: transparent;
        }
        
        .bg-purple {
            background-color: #8B17CE;
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
                    <img src=" {{ asset('images/logo.svg') }}" width="200px" alt="" class="img-responsive menu-logo">
                </div>


            </div>
        </div>
        <div class="jumbotron" style="background-color: #3097D1; margin: 0;">
            <div class="container-fluid bg-primary">
                <div class="col-sm-6">
                    <br><br><br><br><br><br>
                    <h1>Leitor de Rotulo</h1>
                    <p>Obtenha informações tudo sobre a cerveja com o Leitor de rotulos do Virtual-Pub</p>   
                </div>
                <div class="col-sm-6">
                    <img class="pull-right" src="{{ asset('images/logoread.svg') }}" alt="" srcset="">
                </div>
            </div>
        </div>
        <div class="container-fluid bg-purple">
            <div class="row text-center bg-purple">
                <div class="col-sm-12 col-md-4">
                    <div class="thumbnail thumbreset">
                        <img src="{{ asset('images/momentos.svg') }}" alt="teste" srcset="">
                    </div>
                    <div class="caption">
                        <h3>Momentos</h3>
                        <p>Compartilhe momentos com seus amigos</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="thumbnail thumbreset">
                        <img src="{{ asset('images/brinde.svg') }}" whidth="100" alt="Brinde" srcset="">
                    </div>
                    <div class="caption">
                        <h3>Brinde</h3>
                        <p>Faça um Brinde aos momentos</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="thumbnail thumbreset">
                        <img src="{{ asset('images/avalia.svg') }}" alt="teste" srcset="">
                    </div>
                    <div class="caption">
                        <h3>Avalie Cervejas</h3>
                        <p> Faça avaliações daas cervejas artesanais</p>
                    </div>
                </div>
                <p class="meta">
                    Virtal-Pub | Rede social de Cervejas artesanais
                </p>
                <div class="links">
                    <a href="https://github.com/virtual-pub/Virtual-pub-web/" target="_blank">Visite o Github do projeto</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>