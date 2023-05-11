<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('page-title') &mdash; Dra. Nora Mohr de Krause</title>
    <meta name="_token" content="{!! csrf_token() !!}">
    @yield('before-css')
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    @yield('after-css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    @yield('after-css-app')
    <script>
        var app = window.app || {};
        @if (Auth::check())
        app.user = {!! Auth::user() !!};
        @else
        app.user = null;
        @endif


    </script>
    <!-- <script type="text/javascript">
        //<![CDATA[
        var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.comodo.com/" : "http://www.trustlogo.com/");
        document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
        //]]>
    </script> -->
</head>
@yield('body')
</html>
