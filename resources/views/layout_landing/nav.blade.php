<nav id="navbar" class="navbar">
    <ul>
        <li><a class="nav-link scrollto" href="{{ url('/') }}">Beranda</a>
        </li>
        <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
        <li><a class="nav-link scrollto" href="#kerjasama">Kerjasama</a></li>
        <li><a class="nav-link scrollto" href="#capaian">Capaian Prestasi</a></li>
        <li><a class="nav-link scrollto {{ Request::is('produk') ? 'active' : '' }}"
                href="{{ route('daftar-produk') }}">Daftar Produk</a></li>
        @if (empty(Auth::user()->name))
            <li><a class="nav-link scrollto bg-dark" href="{{ url('login') }}">Login</a></li>
        @else
            <li><a class="nav-link scrollto bg-dark" href="{{ route('menu-dashboard') }}">Dashboard</a></li>
        @endif
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->
