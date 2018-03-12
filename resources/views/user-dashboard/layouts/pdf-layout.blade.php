<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>My Business Journey</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" media="all" rel="stylesheet">
    <style media="all">
        .card-header, .card-footer {
            margin-bottom: 80px;
        }
    </style>
</head>

<body>
<div id="app">
    <!-- Top Nav -->
{{--@include('user-dashboard.layouts.partials.nav')--}}
<!-- /top nap -->

    <div class="row">
        <!-- Left Sidebar Menu -->
    {{--@include('user-dashboard.layouts.partials.side-menu')--}}
    <!-- /left sidebar menu -->

        <main class="col-md-12 ml-sm-auto col-lg-12 pt-5 px-5" role="main">

            @yield('content')

        </main>
    </div>

</div>
<!-- Scripts -->

<script src="{{ asset('admin-public/js/app.js') }}"></script>
<script src="https://use.fontawesome.com/d94e52ff8c.js"></script>

</body>
</html>