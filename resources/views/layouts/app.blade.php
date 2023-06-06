<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{-- Bootsrap --}}
    <link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- javascript bootstrap --}}
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js')}}" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    {{-- css native --}}
    <link href="{{asset('css/index.css')}}" rel="stylesheet">

    {{-- cdn awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <style>
        .body{
            padding:5px;
            border-bottom: 2px solid grey;
        }

        span {
            color: grey;
        }
    </style>
</head>
<body>

    @include('layouts.app.header')
        <div class="container">

            @yield('content')

          @include('layouts.app.footer')  
          </div>

    
        
    </body>
    </html>