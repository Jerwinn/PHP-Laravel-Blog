<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">CodeArtisanLab</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">My Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Get latest posts -->
    <main class="container mt-4">
        @yield('content')
    </main>
</body>

</html>
