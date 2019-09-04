<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

         <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">       

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

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                margin: 10% auto;
            }

            li a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px !important;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
            <ul class="nav nav-tabs bg-muted">
                <li class="nav-item">
                <a class="nav-link active" href="/">Home</a>
                </li>
                <div class="ml-auto" style="display:flex;">
                @if (Route::has('login'))
                @auth
                <li class="nav-item" >
                        <a  class="nav-link" href="{{ url('/home') }}">Dashboard</a>
                </li>
                @else                

                <li class="nav-item">
                <a  class="nav-link" href="{{ route('login') }}">Login</a>
                </li>

                @if (Route::has('register'))
                <li class="nav-item">
                <a  class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @endif
             @endauth
             </div>
                </ul>
         @endif
 
        

            <div class="content">
                <div class="title mb-5">
                    LaraCoperative
                </div>

                
            </div>
        </div>
    </body>
</html>
