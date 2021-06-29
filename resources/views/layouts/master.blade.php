<!doctype html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>@yield('title', config('app.name'))</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/fa/css/font-awesome.min.css">
        <link rel="stylesheet" href="//gitcdn.link/repo/wintercounter/Protip/master/protip.min.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <link rel="stylesheet" href="/css/datatable.css">
        {{-- @endif --}}
        <link rel="stylesheet" href="/css/custom.css">
        <link rel="stylesheet" href="/css/main.css">
    </head>

    <body class="m-0 position-absolute h-100  w-100 d-flex flex-column">

        <main class="gh-main text-light">
            @include('layouts.nav')
            <div style="height: 50px"></div>
            @auth
            @include('layouts.sidebar')
            @endauth
            <div id="main-body">
                @yield('body')
            </div>
        </main>

        @section('footer')
        @include('layouts.footer')
        @show

        @section('scripts')
        @include('layouts.scripts')
        @show
        <script src="/js/main.js"></script>
    </body>

</html>
