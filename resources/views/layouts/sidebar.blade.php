<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #060a6f">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> --}}
        <div class="sidebar-brand-text mx-3 h4"><strong>{{ config('app.name') }}</strong></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fa-solid fa-dashboard fa-lg mr-4"></i>
            <span class="h6">Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('kategori*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kategori.index') }}">
            <i class="fa-solid  fa-bars  fa-lg mr-4"></i>
            <span class="h6">Kategori</span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('admin*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fa-solid fa-user-tie  fa-lg mr-4"></i>
            <span class="h6">Data Admin</span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('barang*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('barang.index') }}">
            <i class="fa-solid fa-box  fa-lg mr-4"></i>
            <span class="h6">Data Barang</span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('teknisi*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('teknisi.index') }}">
            <i class="fa-solid fa-user-gear mr-4"></i>
            <span class="h6">Data Teknisi</span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('history*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('history') }}">
            <i class="fa-solid fa-clock-rotate-left fa-lg mr-4"></i>
            <span class="h6">History</span>
        </a>
    </li>
</ul>
