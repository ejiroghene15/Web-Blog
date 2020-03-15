<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>@yield('title', 'Gisthub')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/fa/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/main.css">
    {{-- <link rel="stylesheet" href="/css/gisthub.css"> --}}
</head>

<body class="m-0 position-absolute h-100  w-100 d-flex flex-column">

    <main class="gh-main text-light">
        @include('layouts.nav')
        <div style="height: 50px"></div>
        @include('layouts.sidebar')
        <div id="main-body">
            @yield('body')
        </div>
    </main>


    <footer class="gh-footer font-weight-bold text-center p-3">
        Copyright &COPY; {{date('Y')}}, GistHub. Designed with <i class="fa fa-heart"
            style="color: #d0342c !important"></i> by Ejiroghene
    </footer>

    @section('scripts')
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script charset="utf-8" src="//cdn.iframe.ly/embed.js?api_key=76bce2100b43771fc13ef6"></script>
    <script src="/js/main.js"></script>
    @show

</body>

</html>
