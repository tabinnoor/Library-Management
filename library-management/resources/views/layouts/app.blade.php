<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📚 Book Library - @yield('title', 'Dashboard')</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Custom CSS -->
    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            background: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        main {
            flex: 1;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.4rem;
            color: #000 !important;
        }

        .nav-btn {
            margin-right: 10px;
        }

        footer {
            background-color: #f1f1f1;
            color: #000;
            text-align: center;
            padding: 1rem 0;
            font-weight: bold;
        }

        .card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border: none;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">📚 Book Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav d-flex align-items-center">
                    @auth
                        <li class="nav-item nav-btn">
                            <a class="btn btn-primary text-white" href="{{ route('books.index') }}">Books</a>
                        </li>
                        <li class="nav-item nav-btn">
                            <a class="btn btn-primary text-white" href="{{ route('profile.edit') }}">Profile</a>
                        </li>
                        <li class="nav-item nav-btn">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-primary text-white">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item nav-btn">
                            <a class="btn btn-primary text-white" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item nav-btn">
                            <a class="btn btn-primary text-white" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <small>&copy; {{ date('Y') }} Book Library App. All rights reserved.</small>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
