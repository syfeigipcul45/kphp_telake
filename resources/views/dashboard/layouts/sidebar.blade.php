<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('')}}">
    <div class="sidebar-brand-text mx-3">KPHP Kendilo</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item {{ Request::is('dashboard*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.main.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Main Menu
</div>

@if(Auth::user()->roles[0]->name == 'user')
<!-- Nav Item - Charts -->
<li class="nav-item {{ Request::is('management-news*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.news.index') }}">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Berita</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item {{ Request::is('management-datas*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.datas.index') }}">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>Data Kehutanan</span></a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item {{ Request::is('media*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMedia" aria-expanded="true" aria-controls="collapseMedia">
        <i class="fas fa-fw fa-video"></i>
        <span>Media</span>
    </a>
    <div id="collapseMedia" class="collapse {{ Request::is('media*') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('dashboard.photos.index') }}">Foto</a>
            <a class="collapse-item" href="{{ route('dashboard.videos.index') }}">Video</a>
        </div>
    </div>
</li>

<li class="nav-item {{ Request::is('management-events*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvents" aria-expanded="true" aria-controls="collapseEvents">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Kegiatan</span>
    </a>
    <div id="collapseEvents" class="collapse {{ Request::is('management-events*') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('dashboard.event.index') }}">Halaman</a>
            <!-- <a class="collapse-item" href="{{ route('dashboard.page.events.index') }}">Submenu</a> -->
        </div>
    </div>
</li>
@endif

@php $level_access = ['superadmin', 'admin']; @endphp
@if(in_array(Auth::user()->roles[0]->name, $level_access))
<!-- Nav Item - Charts -->
<li class="nav-item {{ Request::is('management-users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.users.index') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>Pengguna</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item {{ Request::is('management-contact*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.contacts.index') }}">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Pengaduan</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item {{ Request::is('management-news*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.news.index') }}">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Berita</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item {{ Request::is('management-seeds*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.seeds.index') }}">
        <i class="fas fa-fw fa-archive"></i>
        <span>Produk</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item {{ Request::is('management-datas*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.datas.index') }}">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>Data Kehutanan</span></a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item {{ Request::is('media*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMedia" aria-expanded="true" aria-controls="collapseMedia">
        <i class="fas fa-fw fa-video"></i>
        <span>Media</span>
    </a>
    <div id="collapseMedia" class="collapse {{ Request::is('media*') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('dashboard.photos.index') }}">Foto</a>
            <a class="collapse-item" href="{{ route('dashboard.videos.index') }}">Video</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item {{ Request::is('management-pages*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-file"></i>
        <span>Halaman</span>
    </a>
    <div id="collapsePages" class="collapse {{ Request::is('management-pages*') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('dashboard.page.profiles.index') }}">Profil</a>
            <a class="collapse-item" href="{{ route('dashboard.page.depts.index') }}">Seksi</a>
        </div>
    </div>
</li>

<!-- <li class="nav-item {{ Request::is('management-rph*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRPH" aria-expanded="true" aria-controls="collapseRPH">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>RPH</span>
    </a>
    <div id="collapseRPH" class="collapse {{ Request::is('management-rph*') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('dashboard.rph.index') }}">Halaman</a>
            <a class="collapse-item" href="{{ route('dashboard.page.rph.index') }}">Submenu</a>
        </div>
    </div>
</li> -->

<li class="nav-item {{ Request::is('management-events*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvents" aria-expanded="true" aria-controls="collapseEvents">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Kegiatan</span>
    </a>
    <div id="collapseEvents" class="collapse {{ Request::is('management-events*') ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('dashboard.event.index') }}">Halaman</a>
            <a class="collapse-item" href="{{ route('dashboard.page.events.index') }}">Submenu</a>
        </div>
    </div>
</li>
@endif

@if(Auth::user()->roles[0]->name == 'superadmin')
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Pengaturan
</div>

<!-- Nav Item - Charts -->
<li class="nav-item {{ Request::is('management-document-categories*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.document.categories.index') }}">
        <i class="fas fa-fw fa-boxes"></i>
        <span>Kategori Dokumen</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item {{ Request::is('hero-images*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.hero.images.index') }}">
        <i class="fas fa-fw fa-images"></i>
        <span>Gambar Utama</span>
    </a>
</li>

<!-- Nav Item - Tables -->
<!-- <li class="nav-item {{ Request::is('section-profile*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.settings.profile') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>Profil</span>
    </a>
</li> -->

<!-- Nav Item - Tables -->
<li class="nav-item {{ Request::is('settings*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.settings.index') }}">
        <i class="fas fa-fw fa-cog"></i>
        <span>Pengaturan</span></a>
</li>
<li class="nav-item {{ Request::is('settings*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.link.index') }}">
        <i class="fas fa-fw fa-link"></i>
        <span>Link Terkait</span></a>
</li>
@endif

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>