<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Business Journey</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<div id="app">
    <!-- Top Nav -->
@include('partner-dashboard.layouts.partials.nav')
<!-- /top nap -->
    <div class="container-fluid">
        <div class="row">
            <!-- Left Sidebar Menu -->
        @include('partner-dashboard.layouts.partials.side-menu')
        <!-- /left sidebar menu -->

            <main class="col-md-9 ml-sm-auto col-lg-10 pt-5 px-5" role="main">

            <!--  <h2>{{ $panel_name }}</h2> -->

                @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                @endif
                @if(Session::has('error'))
                    <p class="alert alert-error">{{ Session::get('error') }}</p>
                @endif

                @yield('content')

            </main>
        </div>
    </div>

</div>
<!-- Scripts -->

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>