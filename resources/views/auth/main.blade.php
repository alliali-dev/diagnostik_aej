<!DOCTYPE html>
<html lang="en">
<head>
    <title>Connexion Outil Diagnostique</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('asset_login/images/icons/favicon.ico') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('asset_login/vendor/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }} ">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }} ">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset_login/vendor/animate/animate.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset_login/vendor/css-hamburgers/hamburgers.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset_login/vendor/select2/select2.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset_login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset_login/css/main.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
<div class="limiter">
    <div class="ctnt" style="background-image: url('{{ asset('asset_login/images/agenceimage.jpeg') }}');">
        @yield('content')
    </div>
</div>

<script src="{{ asset('asset_login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>

<script src="{{ asset('asset_login/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('asset_login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('asset_login/vendor/select2/select2.min.js') }}"></script>

<script src="{{ asset('asset_login/js/main.js') }}"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
<style>
    .ctnt::before{
        content:"";
        display:block;
        position:absolute;
        z-index:-1;
        width:100%;
        height:100%;
        top:0;
        left:0;
        background:white;
        background:-webkit-linear-gradient(bottom,#F78003,#F78003);
        background:-o-linear-gradient(bottom,#F78003,#F78003);
        background:-moz-linear-gradient(bottom,#F78003,#F78003);
        background:linear-gradient(bottom,#F78003,#F78003);
        opacity:.6
    }

    .ctnt{
        width:100%;
        min-height:100vh;
        display:-webkit-box;
        display:-webkit-flex;
        display:-moz-box;
        display:-ms-flexbox;
        display:flex;
        flex-wrap:wrap;
        justify-content:center;
        align-items:center;
        padding:15px;
        background-repeat:no-repeat;
        background-size:cover;
        background-position:center;
        position:relative;
        z-index:1
    }

</style>
</body>
</html>
