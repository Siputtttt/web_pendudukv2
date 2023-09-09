<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link {{ $title == 'dashboard' ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            @can('root')
                <a class="nav-link {{ $title == 'akun' ? 'active' : '' }}" href="{{ url('/user') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users-gear"></i></div>
                    Kelola Akun
                </a>
            @endcan
            @can('admin')
                <a class="nav-link {{ $title == 'akun' ? 'active' : '' }}" href="{{ url('/user') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users-gear"></i></div>
                    Kelola Akun
                </a>
            @endcan
            @can('rw')
                <a class="nav-link {{ $title == 'akun' ? 'active' : '' }}" href="{{ url('/user') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users-gear"></i></div>
                    Kelola Akun
                </a>
            @endcan
            <a class="nav-link collapsed {{ $title == 'keluarga' ? 'active' : '' }} {{ $title == 'penduduk' ? 'active' : '' }}"
                href="#" data-bs-toggle="collapse" data-bs-target="#kelolapenduduk" aria-expanded="false"
                aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-database"></i></div>
                Kelola Data
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="kelolapenduduk" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ $title == 'keluarga' ? 'active' : '' }}"
                        href="{{ url('/kelolaKeluarga') }}">Kelola Keluarga</a>
                    <a class="nav-link {{ $title == 'penduduk' ? 'active' : '' }}"
                        href="{{ url('/kelolaPenduduk') }}">Kelola Penduduk</a>
                </nav>
            </div>
            {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#sirkulasi"
                aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Sirkulasi Penduduk
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="sirkulasi" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ url('/kelolaKeluarga') }}">Data Lahir</a>
                    <a class="nav-link" href="{{ url('/kelolaKeluarga') }}">Data Meninggal</a>
                    <a class="nav-link" href="{{ url('/kelolaKeluarga') }}">Data Pendatang</a>
                    <a class="nav-link" href="{{ url('/kelolaKeluarga') }}">Data Pindah</a>
                </nav>
            </div> --}}
            <div class="sb-sidenav-menu-heading">Setting</div>
            <a class="nav-link" href="{{ url('/profile') }}">
                <div class="sb-nav-link-icon"><i class="fa-regular fa-id-card"></i></div>
                Profil
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-link" href="{{ route('logout') }}""
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                    LogOut
                </a>
            </form>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>
