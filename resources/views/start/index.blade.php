<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="New" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <meta name="keywords" content="New" />
    <meta name="author" content="New" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- favicon -->
    <link rel="icon" type="icon/png" href="{{ asset('html/images/fav-icons.png') }}">
    <!-- Bootstrap -->
    <link href="{{ asset('html/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('html/css/font-awesome.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,700,800,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('html/css/jquery.mCustomScrollbar.css') }}" />
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('html/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('html/css/responsive.css') }}">
    <script type='text/javascript'>
        (function (d, t) {
            var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
            bh.type = 'text/javascript';
            bh.src = 'https://www.bugherd.com/sidebarv2.js?apikey=kpy6enkbl6fiisvx1mfgug';
            s.parentNode.insertBefore(bh, s);
        })(document, 'script');
    </script>
</head>
<body>

<div id="mbj-app"></div>

<!-- #page -->
<script src="{{ asset('js/app.js') }}"></script>
<!--js Library  -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<!-- React Components js -->


<!-- Bootstrap menu js -->
<script src="{{ asset('html/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('html/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

<!-- Custom js -->
<script src="{{ asset('html/js/custom.js') }}"></script>
</body>
</html>