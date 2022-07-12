<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
    <a class="navbar-brand" href="/">{{ config('app.name', 'Laravel') }}</a>
        <ul class="nav navbar-nav ms-auto">
        @auth
            <li>
                <a class="nav-link text-right" href="{{ route('posts.create') }}">
                    Create New Post
                </a>
            </li>
            <li>
                <a class="nav-link text-right" href="{{ route('logout') }}">
                    Logout
                </a>
            </li>
        @endauth

        @guest
            <li>
                <a class="nav-link text-right" href="{{ route('register') }}">
                    Register
                </a>
            </li>
            <li>
                <a class="nav-link text-right" href="{{ route('login') }}">
                    Login
                </a>
            </li>
        @endguest
        </ul>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
