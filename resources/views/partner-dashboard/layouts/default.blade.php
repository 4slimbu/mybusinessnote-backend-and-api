<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Business Journey</title>

    <script src="{{ asset('admin-public/js/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('admin-public/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '.myeditablediv'
        });
    </script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<div id="app">
    <!-- Top Nav -->
    @include('partner-dashboard.layouts.partials.nav')
    <!-- /top nap -->

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
<!-- Scripts -->

<script src="{{ asset('admin-public/js/app.js') }}"></script>
<script src="https://use.fontawesome.com/d94e52ff8c.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script src="https://unpkg.com/vue@2.1.3/dist/vue.js"></script>

</body>
</html>