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
          <a href="/dosen">Stikom Bali</a>
        </span>
    </header>

    <nav class="sidebar-navigation">
        <ul class="menu">
            <li class="menu-category">Home</li>

            <li class="menu-item  {{Request::segment(2) == "" ? "active" : ""}}">
                <a class="menu-link" href="{{route('dosen.index')}}">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li class="menu-category">Sistem Informasi</li>

            <li class="menu-item {{Request::segment(2) == "kelas" ? "active" : ""}}">
                <a class="menu-link" href="{{route('dosen.kelas.index')}}">
                    <span class="icon pe pe-7s-users"></span>
                    <span class="title">Kelas</span>
                </a>
            </li>

        </ul>
    </nav>
</aside>
<!-- END Sidebar -->
