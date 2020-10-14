<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SIRAT</title>

        <!-- Fonts -->
        <link rel="shortcut icon" href="{{ asset('logo.png') }}">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                justify-content: center;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 50px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                color: white;
            }

        </style>
    </head>
    <body>
        <div style="
        background-image: url('bmkg.png'); 
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        ">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    SIRAT - BMKG
                </div>
                    @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            @if(Auth::user()->role == 1)
                            <a href="{{ url('/home') }}" class="btn btn-primary btn-icon-split btn-sm" style="background-color:#4e9af1">Lanjut</a>
                            @else
                            <a href="{{ url('/users') }}" class="btn btn-primary btn-icon-split btn-sm" style="background-color:#4e9af1">Lanjut</a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-icon-split btn-sm" style="background-color:#4e9af1">LOGIN</a>
                        @endauth
                    </div>
                    @endif
            </div>
        </div>
    </body>
</html>
