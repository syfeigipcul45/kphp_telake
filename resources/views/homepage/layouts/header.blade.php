<div class="container d-flex align-items-center justify-content-lg-between">

    @if(!empty(getOption()->logo))
    <a href="{{ route('homepage.index') }}" class="logo me-auto me-lg-0"><img src="{{ getOption()->logo }}" alt="" class="img-fluid"></a>
    @else
    <h1 class="logo me-auto me-lg-0"><a href="{{ route('homepage.index') }}">KPHP Kendilo<span>.</span></a></h1>
    @endif

    <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
            <li><a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="{{ route('homepage.index') }}">Beranda</a></li>
            <li class="dropdown"><a href="#" class="{{ Request::is('profil*') ? 'active' : '' }}"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    @foreach(getMenuProfile() as $key => $item)
                    <li><a href="{{ route('homepage.profile', $item->slug) }}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="dropdown"><a href="#" class="{{ Request::is('dept*') ? 'active' : '' }}"><span>Seksi</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    @foreach(getMenuDept() as $key => $item)
                    <li><a href="{{ route('homepage.dept', $item->slug) }}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="dropdown"><a href="#" class="{{ Request::is('rph*') ? 'active' : '' }}"><span>RPH</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    @foreach(getMenuRph() as $key => $item)
                    <li><a href="{{ route('homepage.rph', $item->slug) }}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a class="nav-link {{ Request::is('news*') ? 'active' : '' }}" href="{{ route('homepage.news') }}">Berita</a></li>
            <li class="dropdown"><a href="#" class="{{ Request::is('event*') ? 'active' : '' }}"><span>Kegiatan</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    @foreach(getMenuEvent() as $key => $item)
                    <li><a href="{{ route('homepage.event', $item->slug) }}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="dropdown"><a href="#" class="{{ Request::is('media*') ? 'active' : '' }}"><span>Media</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="{{ route('homepage.media.photo') }}">Foto</a></li>
                    <!-- <li><a href="{{ route('homepage.media.video') }}">Video</a></li> -->
                </ul>
            </li>
            <li><a class="nav-link {{ Request::is('forestry-data*') ? 'active' : '' }}" href="{{ route('homepage.forestry') }}">Data Kehutanan</a></li>
            <li><a class="nav-link {{ Request::is('seed-search*') ? 'active' : '' }}" href="{{ route('homepage.seed.search') }}">Cari Produk</a></li>
            <li><a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ route('homepage.contact') }}">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    {{-- <a href="#about" class="get-started-btn scrollto">Get Started</a> --}}

</div>