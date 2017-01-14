<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Cyber Security online training system for a business context."/>
    <meta name="author" content="Tartiner Studios"/>
    <link rel="shortcut icon" href="{{ url('/img/favicon.png') }}"/>

    <title>AusCert | Tartiner Studios</title>

    <link href="{{ url('/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('/css/custom.css') }}" rel="stylesheet"/>
    {{--<link href="{{ url('/css/sb-admin-rtl.css') }}" rel="stylesheet"/>--}}
    <link href="{{ url('/css/quiz.css') }}" rel="stylesheet"/>
    <link href="{{ url('/css/jquery-ui.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('/css/email.css') }}" rel="stylesheet"/>
    <link href="{{ url('/css/font-awesome.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('/css/course.css') }}" rel="stylesheet"/>
    <link href="{{ url('/css/jquery.notifyBar.css') }}" rel="stylesheet"/>
    <link href="{{ url('/css/sweetalert2.min.css') }}" rel=" stylesheet"/>

    <script src="{{ url('/js/jquery.min.js') }}"></script>
    <script src="{{ url('/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('/ckeditor/adapters/jquery.js') }}"></script>
    <script src="{{ url('/js/quiz.js') }}"></script>
    <script src="{{ url('/js/jquery-ui.min.js') }}"></script>
    <script src="{{ url('/js/course.js') }}"></script>
    <script src="{{ url('/js/jquery.notifyBar.js') }}"></script>
    <script src="{{ url('/js/sweetalert2.min.js') }}"></script>
</head>
<body>
<div id="loader"></div>
<script>
    $(window).on('load', function () {
        // Animate loader off screen
        $(".loader").fadeOut("slow");
    });
</script>
@include('dashboard.layouts.header')

@yield('content')

@include('dashboard.layouts.footer')
<!-- Scripts -->
<script src="{{ url('/js/app.js') }}"></script>
<script>
    $(document).ready(function () {
        var url = $(location).attr('href');
        $('a[href="' + url + '"]').parent('li').addClass('active');
    });
</script>
</body>
</html>