<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="left-topbar d-flex align-items-center">
            <a href="javascript:;" class="toggle-btn">	<i class="bx bx-menu"></i>
            </a>
        </div>
        <div class="right-topbar ms-auto">
            <ul class="navbar-nav">

                <li class="nav-item dropdown dropdown-user-profile">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                        <div class="d-flex user-box align-items-center">
                            <div class="user-info">
                                <p class="user-name mb-0">{{ auth('admin')->user()->name }}</p>
                                <p class="designattion mb-0">Admin</p>
                            </div>
                            <img src=" {{ check_file(auth('admin')->user()->image,'user') }}" class="user-img" alt="user avatar">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{route('admin.profile')}}"><i
                                class="bx bx-user"></i><span>Profile</span></a>
                        <a class="dropdown-item" href="{{route('admin.dashboard')}}"><i
                                class="bx bx-tachometer"></i><span>Dashboard</span></a>
                        <div class="dropdown-divider mb-0"></div>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="logout(event)">
                            <i class="bx bx-power-off"></i><span>Logout</span></a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
