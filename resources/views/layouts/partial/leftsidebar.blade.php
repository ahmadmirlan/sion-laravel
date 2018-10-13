<!-- Preloader -->
<div class="preloader">
    <div class="spinner-dots">
        <span class="dot1"></span>
        <span class="dot2"></span>
        <span class="dot3"></span>
    </div>
</div>

<!-- Sidebar -->
<aside class="sidebar sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg">
    <header class="sidebar-header">
        <span class="logo">
          <a href="#'home')}}">Stikom Bali</a>
        </span>
    </header>

    <nav class="sidebar-navigation">
        <ul class="menu">
            <li class="menu-category">Home</li>

            <li class="menu-item {{Request::segment(1) == "" ? "active" : ""}} {{Request::segment(1) == "home" ? "active" : ""}}">
                <a class="menu-link" href="{{route('admin.home')}}">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li class="menu-category">Sistem Informasi</li>

            <li class="menu-item {{Request::segment(1) == "mahasiswa" ? "active" : ""}}">
                <a class="menu-link" href="{{route('admin.mahasiswa.index')}}">
                    <span class="icon pe pe-7s-study"></span>
                    <span class="title">Mahasiswa</span>
                </a>
            </li>

            <li class="menu-item {{Request::segment(1) == "dosen" ? "active" : ""}}">
                <a class="menu-link" href="{{route('admin.dosen.index')}}">
                    <span class="icon pe pe-7s-users"></span>
                    <span class="title">Dosen</span>
                </a>
            </li>

            <li class="menu-item {{Request::segment(1) == "prodi" ? "active" : ""}}">
                <a class="menu-link" href="{{route('admin.prodi.index')}}">
                    <span class="icon pe pe-7s-note2"></span>
                    <span class="title">Prodi</span>
                </a>
            </li>

            <li class="menu-item {{Request::segment(1) == "matakuliah" ? "active" : ""}}">
                <a class="menu-link" href="{{route('admin.matakuliah.index')}}">
                    <span class="icon pe pe-7s-bookmarks"></span>
                    <span class="title">Mata Kuliah</span>
                </a>
            </li>

            <li class="menu-item {{Request::segment(1) == "ruangan" ? "active" : ""}}">
                <a class="menu-link" href="{{route('admin.ruangan.index')}}">
                    <span class="icon pe pe-7s-box2"></span>
                    <span class="title">Ruangan</span>
                </a>
            </li>

            <li class="menu-item {{Request::segment(1) == "agama" ? "active" : ""}}">
                <a class="menu-link" href="{{route('admin.agama.index')}}">
                    <span class="icon pe pe-7s-menu"></span>
                    <span class="title">Agama</span>
                </a>
            </li>

            <li class="menu-category">Perkuliahan</li>

            <li class="menu-item {{Request::segment(1) == "kelas" ? "active" : ""}}">
                <a class="menu-link" href="{{route('admin.kelas.index')}}">
                    <span class="icon ti ti-home"></span>
                    <span class="title">Kelas</span>
                </a>
            </li>


            <li class="menu-category">Administrasi</li>


            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon fa fa-user"></span>
                    <span class="title">Pengguna</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">
                    <li class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="dot"></span>
                            <span class="title">Sidebar</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="dot"></span>
                            <span class="title">Header</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="dot"></span>
                            <span class="title">Footer</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</aside>
<!-- END Sidebar -->
