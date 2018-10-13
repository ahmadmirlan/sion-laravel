<!-- Topbar -->
<header class="topbar">
    <div class="topbar-left">
        <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span>
    </div>

    <div class="topbar-right">
        <ul class="topbar-btns">
            <li class="dropdown">
                <span class="topbar-btn" data-toggle="dropdown"><img class="avatar" src="/assets/img/avatar/1.jpg" alt="..."></span>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="page/profile.html"><i class="ti-user"></i> Profile</a>
                    <a class="dropdown-item" href="page-app/mailbox.html">
                        <div class="flexbox">
                            <i class="ti-email"></i>
                            <span class="flex-grow">Inbox</span>
                            <span class="badge badge-pill badge-info">5</span>
                        </div>
                    </a>
                    <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="page-extra/user-lock-1.html"><i class="ti-lock"></i> Lock</a>
                    <a class="dropdown-item" href="{{route('admin.logout')}}"><i class="ti-power-off"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</header>
<!-- END Topbar -->