<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Business Journey</title>

    <!-- favicon -->
    <link rel="icon" type="icon/png" href="{{ asset('images/fav-icons.png') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<div id="app">
    <!-- Top Nav -->
@include('admin.layouts.partials.nav')
<!-- /top nap -->

    <div class="row">
        <!-- Left Sidebar Menu -->
    @include('admin.layouts.partials.side-menu')
    <!-- /left sidebar menu -->

        <main class="col-md-9 ml-sm-auto col-lg-10 pt-5 px-5" role="main">

        <!--  <h2>{{ $panel_name }}</h2> -->

            @if(Session::has('success'))
                <p class="alert alert-success flash-message">{{ Session::get('success') }}</p>
            @endif
            @if(Session::has('error'))
                <p class="alert alert-error flash-message">{{ Session::get('error') }}</p>
            @endif

            @yield('content')

        </main>
    </div>

</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('admin-public/js/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('admin-public/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        if (document.getElementsByClassName("myeditablediv")) {
            tinymce.init({
                selector: '.myeditablediv',
                theme: 'modern',
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor textcolor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code help wordcount'
                ],
                toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | code | help',
                branding: false
            });
        }

        // Flash session message
        $(window).on('load', function () {
            if ($(".flash-message").length) {
                setTimeout(function () {
                    $(".flash-message").fadeOut();
                }, 5000);
            }
        });

    // toggle show categories checkbox and select options
    if ($("#show_everywhere").length && $("#business_categories").length) {
        $(window).on('load', function () {
            // init
            if ($('#show_everywhere').is(':checked')) {
                $("#business_categories").hide();
            } else {
                $("#business_categories").show();
            }

            // on click
            $("#show_everywhere").on('click', function () {
                if ($('#show_everywhere').is(':checked')) {
                    $('#show_everywhere').val(1);
                    $("#business_categories").slideUp();
                } else {
                    $('#show_everywhere').val(0);
                    $("#business_categories").slideDown();
                }
            });
        });
    }

    // toggle physical address
    // toggle show categories checkbox and select options
    if ($("#show_physical_address").length && $(".physical_address").length) {
        $(window).on('load', function () {
            // init
            if ($('#show_physical_address').is(':checked')) {
                $(".physical_address").hide();
            } else {
                $(".physical_address").show();
            }

            // on click
            $("#show_physical_address").on('click', function () {
                if ($('#show_physical_address').is(':checked')) {
                    $('#show_physical_address').val(1);
                    $(".physical_address").slideUp();
                } else {
                    $('#show_physical_address').val(0);
                    $(".physical_address").slideDown();
                }
            });
        });
    }

</script>
</body>
</html>