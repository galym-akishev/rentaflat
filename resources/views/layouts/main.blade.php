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
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('advertisement.index') }}">Listings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('advertisement.create') }}">Create Ad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('amenity.index') }}">Amenities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('amenity.create') }}">Create amenity</a>
                    </li>
                    @can('view', auth()->user())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.advertisement.index') }}">Admin</a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

@yield('content')

</body>

</html>
