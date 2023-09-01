<nav class="navbar navbar-expand navbar-light  topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    @if (request()->routeIs('service*'))
        <a class="sidebar-brand justify-content-center" href="/">
            <!-- Modified div to control background color -->
            <div class="sidebar-brand-text mx-3 h4 custom-bg font-weight-bold">{{ config('app.name') }}</div>
        </a>
        <style>
            .navbar {
                background-color: #1c2260;
            }

            /* Custom CSS for the sidebar brand background */
            .custom-bg {
                background-color: white;
                color: #1c2260;
                padding: 5px 15px;
                margin: 0;
                position: absolute;
                top: 0;
                /* Align the background to the top of the container */
                left: 0;
                bottom: 0;
                /* Optionally, align the background to the left */
                display: flex;
                /* Use flexbox */
                align-items: center;
                /* Vertically center the content */
            }

            /* Optionally, to center the text horizontally */
            .custom-bg strong {
                display: flex;
                justify-content: center;
            }
        </style>
    @endif

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle btn btn-outline-primary" href="{{ route('service') }}"
                style="{{ request()->routeIs('service') ? 'color:white' : 'color:#060a6f; background-color: #5f64f4' }}">
                Service
            </a>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{ auth()->user()->profile_photo_url }}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('dashboard') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Dashboard
                </a>
                <a class="dropdown-item" href="{{ route('web.setting') }}">
                    <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                    Web Settings
                </a>
                <a class="dropdown-item" href="{{ route('env-editor.index') }}">
                    <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                    Env Editor
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal"
                    onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin keluar?')) { document.getElementById('logout-form').submit(); }">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </li>

    </ul>

</nav>
