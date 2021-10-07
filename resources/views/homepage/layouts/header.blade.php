<div class="container d-flex align-items-center justify-content-lg-between">

    @if(!empty(getOption()->logo))
    <a href="index.html" class="logo me-auto me-lg-0"><img src="{{ getOption()->logo }}" alt="" class="img-fluid"></a>
    @else
    <h1 class="logo me-auto me-lg-0"><a href="{{ route('homepage.index') }}">KPHP Kendilo<span>.</span></a></h1>
    @endif

    <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
            <li><a class="nav-link text-uppercase {{ Request::is('/') ? 'active' : '' }}" href="{{ route('homepage.index') }}">Beranda</a></li>
            <li class="dropdown"><a href="#" class="text-uppercase {{ Request::is('profile*') ? 'active' : '' }}"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="{{ route('homepage.kaltim') }}">Hutan Kaltim</a></li>
                    <li><a href="{{ route('homepage.vision') }}">Visi dan Misi</a></li>
                    <li><a href="{{ route('homepage.structure') }}">Struktur Organisasi</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#" class="text-uppercase"><span>Bidang</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="#">Sekretariat</a></li>
                    <li><a href="#">Perencanaan dan Pemanfaatan Kawasan Hutan</a></li>
                    <li><a href="#">Perlindungan dan Konservasi Sumber Daya Alam Ekosistem</a></li>
                    <li><a href="#">Pengelolaan Daerah Aliran Sungai dan Rehabilitasi Hutan Lahan</a></li>
                    <li><a href="#">Penyuluhan dan Pemberdayaan Masyarakat Hutan</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#" class="text-uppercase {{ Request::is('profile*') ? 'active' : '' }}"><span>Wilayah</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="{{ route('homepage.kaltim') }}">Potensi</a></li>
                    <li><a href="{{ route('homepage.vision') }}">Risalah</a></li>
                </ul>
            </li>
            <li><a class="nav-link text-uppercase {{ Request::is('news*') ? 'active' : '' }}" href="{{ route('homepage.news') }}">Berita</a></li>
            <li class="dropdown"><a href="#" class="text-uppercase {{ Request::is('profile*') ? 'active' : '' }}"><span>Kegiatan</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="{{ route('homepage.kaltim') }}">Tata Usaha</a></li>
                    <li><a href="{{ route('homepage.vision') }}">Tata Hutan dan Perencanaan</a></li>
                    <li><a href="{{ route('homepage.structure') }}">Perhutanan Sosial</a></li>
                    <li><a href="{{ route('homepage.structure') }}">Penanggulangan Kebakaran Hutan dan Lahan</a></li>
                    <li><a href="{{ route('homepage.structure') }}">Perlindungan dan Pengamanan Hutan</a></li>
                    <li><a href="{{ route('homepage.structure') }}">Rehabilitasi Hutan dan Lahan</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#" class="text-uppercase {{ Request::is('media*') ? 'active' : '' }}"><span>Media</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="{{ route('homepage.media.photo') }}">Galeri</a></li>
                    <li><a href="{{ route('homepage.media.video') }}">Video</a></li>
                </ul>
            </li>
            <li><a class="nav-link text-uppercase {{ Request::is('forestry-data*') ? 'active' : '' }}" href="{{ route('homepage.forestry') }}">Data Kehutanan</a></li>
            <li><a class="nav-link text-uppercase {{ Request::is('seed-search*') ? 'active' : '' }}" href="{{ route('homepage.seed.search') }}">Cari Produk</a></li>
            <li><a class="nav-link text-uppercase {{ Request::is('contact*') ? 'active' : '' }}" href="{{ route('homepage.contact') }}">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    {{-- <a href="#about" class="get-started-btn scrollto">Get Started</a> --}}

</div>