<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

  <body>

    @include('layouts.nav')
    <div id="app" class="container">
        <div class="main-content">
             @yield('content')
        </div>
    </div>
    
    @include('layouts.footer')
    
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
    <script src="https://use.fontawesome.com/d94e52ff8c.js"></script>


  </body>
</html>