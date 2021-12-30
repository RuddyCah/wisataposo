<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.84.0">
        <title>Wisata Poso - @yield('title')</title>

        {{-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/"> --}}

        <!-- Bootstrap core CSS -->
        <link href="{{ asset ('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset ('vendor/fontawesome-free/css/fontawesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset ('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">


        <!-- Custom styles for this template -->
        <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
        <!-- Custom styles-->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        
        @extends('layouts.header')

        <div id="app">
            <main class="">
                @yield('content')
            </main>
        </div>

        @extends('layouts.footer')

        <script src="{{ asset ('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset ('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset ('js/app.js') }}"></script>

    </body>
</html>
