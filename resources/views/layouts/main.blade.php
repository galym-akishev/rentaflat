<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Rentaflat - rent a flat</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Rentaflat - portfolio website on Laravel/PHP">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ Vite::asset('resources/images/favicon.png') }}"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body id="body">

<div class="container">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand mx-2" href="/">Rentaflat</a>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home.index') }}">Home</a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('advertisement.index') }}">Listings</a>
                    </li>
                    @can('create', App\Models\Advertisement::class)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('advertisement.create') }}">Create Ad</a>
                        </li>
                    @endcan
                    @can('view', auth()->user())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.advertisement.index') }}">Admin</a>
                        </li>
                    @endcan
                </ul>
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>
</div>

@yield('content')

</body>

</html>
