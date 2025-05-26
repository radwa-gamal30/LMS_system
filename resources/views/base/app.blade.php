<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title', 'My Laravel App')</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        nav,footer, .btn-styled{
      background-color: #8f3232;

        }
        .panel-body{
            /* icon-image */
            display: flex;
            align-items: center;
            height: 50px;
            width: 50px; 
            
        }
        .btn{
            color: #ffff;
        }
    </style>
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top">
        <div class="container">
            <div class="panel-body">
                <img src="{{ asset('/storage/images/png-transparent.png') }}" style="max-height: 40px;">
            </div>
            <a class="navbar-brand" href="#">Learning | Good Mind</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.index') }}">

                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses.index') }}">
                            <i class="fas fa-book"></i> Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <i class="fas fa-user-graduate"></i> Students
                        </a>
                    </li>
                </ul>
            </div>
            {{-- add logout button in nav if home and hiddenin any other page --}}

            <div class="d-flex">
                @auth
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a href="{{ route('logout') }}" class="btn btn-outline-light" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-light">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                @endguest
        </div>
    </nav>

    <!-- Page Content -->
    <main class="container py-4 mt-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-white text-center py-3 mt-auto fixed-bottom">
        &copy; {{ date('Y') }} My Laravel App. All rights reserved.
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
