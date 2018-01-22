<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('admin-public/js/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('admin-public/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '.myeditablediv'
        });
    </script>

    <!-- Styles -->
    <link href="{{ asset('admin-public/css/app.css') }}" rel="stylesheet">
</head>

<body>
<div id="app" class="container-fluid">
    <!-- Top Nav -->
    @include('admin.layouts.partials.nav')
    <!-- /top nap -->

    <div class="row">
        <!-- Left Sidebar Menu -->
        @include('admin.layouts.partials.side-menu')
        <!-- /left sidebar menu -->

        <main class="col-sm-9 ml-sm-auto col-md-9 pt-3" role="main">

            <h1>{{ $panel_name }}</h1>

            @yield('content')

        </main>
    </div>

    @include('admin.layouts.partials.footer')
</div>
<!-- Scripts -->

<script src="{{ asset('admin-public/js/app.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

{{--<script src="https://unpkg.com/vue@2.1.3/dist/vue.js"></script>--}}


</body>
</html>