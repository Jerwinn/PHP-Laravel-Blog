<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/bootstrap.min.css')}}" />
    <!-- Bootstrap 4 Js -->
    <script type="text/javascript" src="{{asset('bootstrap/bootstrap.min.js')}}"></script>
    <!-- Jquery -->
    <script type="text/javascript" src="{{asset('bootstrap/jquery-3.6.0.min.js')}}"></script>
    <!-- Bootstrap 4 Js -->
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{url('/')}}">The Life Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/categories')}}">Categories</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('login')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('register')}}">Register</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('user-post')}}">Add Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{url('logout')}}">Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </ul>
            </div>
    </nav>
    <!-- Get users latest posts -->
    <main class="container mt-4">
        @yield('content')
    </main>
</body>

</html>
