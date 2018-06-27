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
            background-color: #f39c12;
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
            color: #000;
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
            margin-top:30px;
            fill: #000 !important;

        }

        .backwhite {
            background-color: #fff;
        }

        .thumbreset {
            border: none;
            background-color: transparent;
        }
        
    </style>
</head>

<body>
    <div class="section">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-right links" >
                @if (Auth::check())
                <a href="{{ url('/home') }}">home</a>
                @else
                <a href="{{ route('social.login') }}">Login</a>
                <a href="{{ url('/register') }}">Registrar</a>
                @endif
            </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img src=" {{ asset('images/logo.svg') }}" width="200px" alt="" class="img-responsive menu-logo" style="margin-top: 50px;">
                </div>


            </div>
        </div>
        <div class="jumbotron" style="background-color: black; margin: 0;">
            <div class="container-fluid">
                <div class="col-sm-6">
                    <br><br><br><br><br><br>
                    <h1>Leitor de Rótulo</h1>
                    <p>Obtenha informações tudo sobre a cerveja com o Leitor de rótulos do Virtual-Pub</p>   
                </div>
                <div class="col-sm-6">
                    <img class="img-responsive pull-right" src="{{ asset('images/logoread.svg') }}" alt="" srcset="">
                </div>
            </div>
        </div>
        <div class="container-fluid" style="background-color: #f39c12">
            <div class="row text-center" style="background-color: #f39c12">
                <div class="col-sm-12 col-md-4">
                    <div class="thumbnail thumbreset">
                        <img src="{{ asset('images/momentos.svg') }}" alt="teste" srcset="">
                    </div>
                    <div class="caption">
                        <h3>Momentos</h3>
                        <b>Compartilhe momentos com seus amigos</b>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="thumbnail thumbreset">
                        <img src="{{ asset('images/brinde.svg') }}" whidth="100" alt="Brinde" srcset="">
                    </div>
                    <div class="caption">
                        <h3>Brinde</h3>
                        <b>Faça um Brinde aos momentos</b>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="thumbnail thumbreset">
                        <img src="{{ asset('images/avalia.svg') }}" alt="teste" srcset="">
                    </div>
                    <div class="caption">
                        <h3>Avalie Cervejas</h3>
                        <b> Faça avaliações das cervejas artesanais</b>
                    </div>
                </div>
                <br>
                <p class="meta">
                    &nbsp;
                </p>
                <div class="links">
                    <a href="https://github.com/virtual-pub/Virtual-pub-web/" target="_blank">Visite o Github do projeto</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>