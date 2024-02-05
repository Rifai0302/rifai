<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>64mart</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(to right, #343a40, #495057);">
            <div class="container">
                @guest
                    <!-- Tidak menampilkan navbar jika pengguna belum login -->
                    <div class="marquee">
                        <span class="navbar-brand" style="font-weight: bold; cursive; font-size: 25px; color: white;">Selamat Datang di 64Mart - Belanja Mudah dan Cepat!</span>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                @else
                    <!-- Menampilkan navbar hanya jika pengguna sudah login -->
                    <a class="navbar-brand animate__animated animate__slideInDown" href="{{ url('/') }}" style="font-family: 'Brush Script MT', cursive; font-size: 25px; color: white;">64Mart</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                        <ul class="navbar-nav ml-auto animate__animated animate__slideInDown">
                            @auth
                            @if (Auth::user()->role_id === 3)
    <li class="nav-item">
        <a class="nav-link {{ $page == 'Home' ? 'active' : '' }}" style="font-style: italic; font-weight:Bold; color: white" href="{{ route('home') }}">Beranda</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $page == 'Transaksi' ? 'active' : '' }}" style="font-style: italic; font-weight:Bold; color: white" href="{{ route('transaksi') }}">Belanja</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $page == 'Topup' ? 'active' : '' }}" style="font-style: italic; font-weight:Bold; color: white" href="{{ route('topup') }}">Top Up</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $page == 'Tariktunai' ? 'active' : '' }}" style="font-style: italic; font-weight:Bold; color: white" href="{{ route('tariktunai') }}">Tarik Tunai</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $page == 'DataBank' ? 'active' : '' }}" style="font-style: italic; font-weight:Bold; color: white" href="{{ route('data_bank') }}">Riwayat Bank</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $page == 'DataKantin' ? 'active' : '' }}" style="font-style: italic; font-weight:Bold; color: white" href="{{ route('data_kantin') }}">Riwayat Kantin</a>
    </li>
@endif

    
                                @if (Auth::user()->role_id === 2)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $page == 'Home' ? 'active' : '' }}" style="font-weight: bold; color: white" aria-current="page" href="{{ route('home') }}">Beranda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $page == 'Menu' ? 'active' : '' }} " style="font-weight: bold; color: white" href="{{ route('menu') }}">Menu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $page == 'Data Transaksi' ? 'active' : '' }}" style="font-weight: bold; color: white" href="{{ route('data_transaksi') }}">Data Transaksi</a>
                                    </li>
                                @endif
    
                                @if (Auth::user()->role_id === 1)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $page == 'Home' ? 'active' : '' }}" style="font-weight: bold; color: white" aria-current="page" href="{{ route('home') }}">Beranda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $page == 'Transaksi Bank' ? 'active' : '' }}" style="font-weight: bold; color: white" href="{{ route('transaksi_bank') }}">Transaksi Bank</a>
                                    </li>
                                @endif
                            @endauth
                        </ul>
    
                        <ul class="navbar-nav ms-auto animate__animated animate__slideInDown">
                            @guest
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" style="font-style: Lucida Bright; font-weight: bold; color: white" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right slide-down" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                @endguest
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS (Popper.js and Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Your existing scripts -->
    <script src="{{ asset('js/navbar.js') }}"></script>
</body>
</html>
