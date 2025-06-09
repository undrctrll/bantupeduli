<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Donasi - Bantu Peduli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
        }

        /* Navbar Glass Effect + Sticky */
        .navbar-glass {
            position: sticky;
            top: 0;
            z-index: 1030;
            backdrop-filter: blur(12px);
            background-color: rgba(255, 255, 255, 0.52);
            border-bottom: 1px solid rgba(200, 200, 200, 0.3);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            transition: all 0.2s ease-in-out;
            color: #333;
        }

        .navbar-nav .nav-link:hover {
            color: #0d6efd;
        }

        .navbar-nav .nav-link.active {
            color: #0d6efd !important;
            font-weight: 600;
            position: relative;
        }

        .navbar-nav .nav-link.active::after {
            content: '';
            display: block;
            width: 20px;
            height: 2px;
            background: #0d6efd;
            margin-top: 4px;
            border-radius: 1px;
        }

        .btn-sm {
            font-size: 0.875rem;
            padding: 0.4rem 0.75rem;
            border-radius: 0.5rem;
        }

        .navbar-toggler {
            border: none;
        }

        .dropdown-menu {
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .dropdown-item:hover {
            background-color: #f0f4ff;
        }
    </style>

</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-light navbar-glass py-3">
    <div class="container">
        <a class="navbar-brand text-primary" href="{{ url('/') }}">
            Bantu Peduli
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('donations.*') ? 'active' : '' }}" href="{{ route('donations.index') }}">Donasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('program') ? 'active' : '' }}" href="{{ route('program') }}">Program</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Kontak</a>
                </li>

                @auth
                <div class="dropdown">
                    <button class="btn dropdown-toggle d-flex align-items-center justify-content-center" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="padding: 0.18rem 0.4rem; min-width: 40px; box-shadow: none; border: none; background: transparent;">
                        <img src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}" alt="Avatar" class="rounded-circle" width="32" height="32">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Settings</a></li>
                        @if(Auth::user()->role === 'admin')
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                    <li class="nav-item">
                        <a class="btn btn-primary btn-sm ms-lg-3" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary btn-sm ms-lg-2" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>


    <main class="container py-4 flex-grow-1">
        @yield('content')
    </main>

    <footer class="bg-dark text-white pt-5 pb-4 mt-5 w-100 mt-auto">
        <div class="container">
            <div class="row gy-4">
                <!-- Tentang -->
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Bantu Peduli</h5>
                    <p>Kami adalah platform donasi yang berfokus membantu anak-anak panti asuhan untuk masa depan yang lebih cerah.</p>
                    <div class="d-flex gap-3 mt-3">
                        <a href="#" class="text-white text-decoration-none"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white text-decoration-none"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white text-decoration-none"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="text-white text-decoration-none"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                <!-- Navigasi -->
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Navigasi</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-white text-decoration-none">Beranda</a></li>
                        <li><a href="{{ route('donations.index') }}" class="text-white text-decoration-none">Donasi</a></li>
                        <li><a href="{{ route('program') }}" class="text-white text-decoration-none">Program</a></li>
                        <li><a href="{{ route('about') }}" class="text-white text-decoration-none">Tentang Kami</a></li>
                        <li><a href="{{ route('contact') }}" class="text-white text-decoration-none">Kontak</a></li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Hubungi Kami</h5>
                    <p class="mb-1"><i class="bi bi-envelope-fill me-2"></i> admin@bantupeduli.id</p>
                    <p class="mb-1"><i class="bi bi-telephone-fill me-2"></i> +62 812 2525 1451</p>
                    <p class="mb-0"><i class="bi bi-geo-alt-fill me-2"></i> Jl. Karang Suci No.19, Cilacap Tengah, Jawa Tengah</p>
                </div>
            </div>

            <hr class="border-light my-4">

            <div class="text-center small">
                &copy; {{ date('Y') }} Bantu Peduli. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

    @if(session('success') || session('status'))
        <div id="toast-notif" class="position-fixed top-0 end-0 p-3" style="z-index: 9999; min-width: 300px;">
            <div class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="4000" data-bs-autohide="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') ?? session('status') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var toastEl = document.querySelector('#toast-notif .toast');
                if (toastEl) {
                    var toast = new bootstrap.Toast(toastEl);
                    toast.show();
                }
            });
        </script>
    @endif
</body>
</html>
