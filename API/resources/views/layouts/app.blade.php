<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/fonts/fontawesome/css/fontawesome-all.css') }}" rel="stylesheet">

    

</head>

<body>
    <div id='topBanner'>
        <a href='{{route('home',[app()->getLocale()])}}'>
            <img src="{{URL::asset('/thumbs/logo.png')}}"/>
            <h1>Projet Cegep Serre Tech</h2>
        </a>
    </div>
@section('pageContent')
@show <!-- Section's end -->
</body>
</html>