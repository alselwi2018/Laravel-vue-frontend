<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sykes Cottages</title>



        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        {{-- script --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('bootstrap/jQuery.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
     {{-- css --}}
    <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" >
    <link href="{{ asset('/fontawesome/css/fontawesome.min.css') }}">
    <link href="{{ asset('/fontawesome/css/solid.min.css') }}">
    <script src="{{ asset('/fontawesome/js/fontawesome.min.js') }}"></script>
    <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body>
        <div id="app">
            @include('layout.nav')
            <div class="container">

                @yield('contents')
            </div>
        </div>
    </body>
</html>
