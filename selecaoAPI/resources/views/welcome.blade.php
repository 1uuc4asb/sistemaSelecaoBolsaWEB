<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema de seleção de bolsa</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #B3E5FC;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .header {
            text-align: center;
            background-color:#03A9F4;
            color: white;
            height: 400px;
            width: 100%;
            position: fixed;
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
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        button {
            background-color: #7299ff;
            color: white;
            padding: 20px;
            height: 100px;
            width: 200px;
        }
    </style>
</head>
<body>
<div class="position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                @endif
            @endauth
        </div>
    @endif

    {{--<div class="content">
        <div class="title m-b-md">
            Sistema de seleção de bolsa
        </div>--}}

    <div class="links">
        {{--@guest
            Bem vindo ao melhor site de seleção de bolsas do mundo! Faça Login para visualizar as seleções.
        @else
            O melhor site de seleção de bolsas do mundo!
        @endguest--}}
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="header">
        <div class="content">


            <h1 style="font-size: 50px; margin-top: 100px;">
                iSelect - A solução para seleções de bolsas de estudo
            </h1>
            <h2>
                A forma mais fácil e rápida para se candidatar ou oferecer oportunidades de bolsas de estudo!
            </h2>
            <h4>Feito por: Alexandre, Gabriel, Guilherme, Lucas e Wilton!</h4>
            {{--<div align="row">
                <button>
                    Realizar login
                </button>
                <button>
                    Não possuo conta, desejo me cadastrar
                </button>
            </div>--}}
        </div>

    </div>
</div>
</body>
</html>
