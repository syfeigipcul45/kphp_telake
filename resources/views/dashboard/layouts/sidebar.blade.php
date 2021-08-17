<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-file"></i>
        <span>Halaman</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Profil:</h6>
            <a class="collapse-item" href="#">Hutan Kaltim</a>
            <a class="collapse-item" href="#">Visi & Misi</a>
            <a class="collapse-item" href="#">Struktur & Organisasi</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Bidang:</h6>
            <a class="collapse-item" href="#">Sekretariat</a>
            <a class="collapse-item" href="#">Perencanaan</a>
            <a class="collapse-item" href="#">Perlindungan</a>
            <a class="collapse-item" href="#">Pengelolaan</a>
            <a class="collapse-item" href="#">Penyuluhan</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Pengaturan
</div>

<!-- Nav Item - Tables -->
<li class="nav-item {{ Request::is('settings*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.settings.index') }}">
        <i class="fas fa-fw fa-cog"></i>
        <span>Pengaturan</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>