<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Rentaflat - rent a flat</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Rentaflat - portfolio website on Laravel/PHP">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <link rel="shortcut icon" type="image/x-icon" href="{{ Vite::asset('resources/images/favicon.png') }}"/>

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ Vite::asset('resources/plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ Vite::asset('resources/plugins/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ Vite::asset('resources/plugins/animate-css/animate.css') }}">
    <link rel="stylesheet" href="{{ Vite::asset('resources/plugins/magnific-popup/magnific-popup.css') }}/">
    <link rel="stylesheet" href="{{ Vite::asset('resources/plugins/slick/slick.css') }}">
</head>

<body id="body">

<header class="navigation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg p-0">
                    <a class="navbar-brand" href="/">
                        <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Logo">
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                            data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="ion-android-menu"></span>
                    </button>
                    <div class="collapse navbar-collapse ml-auto" id="navbar">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('advertisement.index') }}">Advertisements</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('advertisement.create') }}">Create New Ad</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

@yield('content')

<!-- Main jQuery -->
<script src="{{ Vite::asset('resources/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 3.1 -->
<script src="{{ Vite::asset('resources/plugins/bootstrap/bootstrap.min.js') }}"></script>
<!-- slick Carousel -->
<script src="{{ Vite::asset('resources/plugins/slick/slick.min.js') }}"></script>
<script src="{{ Vite::asset('resources/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<!-- filter -->
<script src="{{ Vite::asset('resources/plugins/shuffle/shuffle.min.js') }}"></script>
<script src="{{ Vite::asset('resources/plugins/SyoTimer/jquery.syotimer.min.js') }}"></script>
<script src="{{ Vite::asset('resources/js/script.js') }}"></script>

</body>

</html>
