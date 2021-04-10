<header id="header" class="fixed-top">
    <div class="container d-flex">

        <div class="logo mr-auto">
            {{-- <img src="{{ url('assets/template/img/mosque.png')}}" alt=""> --}}
            <h1 class="text-light">SIMAS</h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li><a href="{{ route('user/beranda') }}" class="@yield('home-menu-active')">Beranda</a></li>
                <li class="drop-down"><a href="#" class="@yield('sholat-menu-active')">Sholat</a>
                    <ul>
                        <li><a href="{{ route('user/imam') }}">Jadwal Imam Sholat</a></li>
                        <li><a href="{{ route('user/khutbah') }}">Jadwal Khutbah Jumat</a></li>
                    </ul>
                </li>
                <li class="drop-down"><a href="#" class="@yield('kas-menu-active')">Kas Masjid</a>
                    <ul>
                      <li><a href="{{ route('user/pemasukan') }}">Pemasukan</a></li>
                      <li><a href="{{ route('user/pengeluaran') }}">Pengeluaran</a></li>
                    </ul>
                </li>
                {{-- <li class="drop-down"><a href="#"  class="@yield('layanan-menu-active')">Layanan</a>
                    <ul>
                      <li><a href="{{ route('user/muallaf') }}">Muallaf Center</a></li>
                    </ul>
                </li> --}}
                <li ><a href="{{ route('user/kegiatan') }}" class="@yield('kegiatan-menu-active')">Kegiatan</a></li>
                <li><a href="{{ route('user/gallery') }}" class="@yield('gallery-menu-active')">Gallery</a></li>
                <li><a href="{{ url('/login') }}" class="@yield('login-menu-active')">Login</a></li>

            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header>