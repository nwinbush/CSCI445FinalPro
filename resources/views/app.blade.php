<!DOCTYPE html>
<html>
<head>
    <link rel = "stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
        .navbar-default {
            background-color: #60B632;
            border-color: #E7E7E7;
            padding-right: 20px;
        }
        .navbar-default .navbar-brand {
            color: #000000;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-default">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('home') }}">CS Connect Competition Group</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('home') }}">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
            <li><button type='button' class='btn btn-default navbar-btn'><a href='{{ URL::to('auth/register') }}'>Register</a></button></li>
            <li><button type='button' class='btn btn-default navbar-btn'><a href='{{ URL::to('auth/login') }}'>Login</a></button></li>
        @else
            <li><button type='button' class='btn btn-default navbar-btn'><a href='{{ URL::to('auth/logout') }}'>Logout</a></button></li>
        @endif

    </ul>
</nav>

<div class="container">
    @yield('content')
</div>

@yield('footer')
</body>
</html>