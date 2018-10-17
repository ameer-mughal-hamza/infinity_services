<!DOCTYPE HTML>
<html>
<head>
    <title>Infinity Services</title>
    <link rel="stylesheet" href="{{ URL::to('css/readable-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('font-awesome-4.3.0/css/font-awesome.min.css') }}">
    @yield('css')
</head>
<body>
@yield('content')
</body>
@yield('js')
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
</html>