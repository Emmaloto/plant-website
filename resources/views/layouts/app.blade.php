<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Arboretum Project</title>
    <!-- <title>{{ config('app.name', '') }} <link rel="icon" href="/images/tree.png"> </title> -->

    
    <link rel="icon" href="{!! asset('images/tree.png') !!}"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/custom.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    
    <!--<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> -->
    <!--<link rel="stylesheet/less" type="text/css" href="{{ asset('app.less') }}" > -->
</head>
<body>
    <div id="app">
        @include('inc.navbar')

        <main class="py-4 container">
            @include('inc.messages')
            @yield('content')
        </main>
    </div>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>  

</body>

  
</html>
