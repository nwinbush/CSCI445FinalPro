<!DOCTYPE html>
<html>
<head>
    <link rel = "stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
        .navbar-default {
            background-color: #60B632;
            border-color: #E7E7E7;
        }
        .navbar-default .navbar-brand {
            color: #000000;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-default">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('books') }}">CS Connect Competition Group</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('auth/login') }}">Login</a></li>
        <li><a href="{{ URL::to('auth/logout') }}">Logout</a></li>
    </ul>
</nav>

<div class="container">
    @yield('content')
</div>

@yield('footer')
</body>
</html>