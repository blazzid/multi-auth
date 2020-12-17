<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-flat" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
            <li class="nav-header">MENU UTAMA</li>

            <li class="nav-item">
                <a href="/home" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            @can('manajemen_user', Model::class)
            <li class="nav-item has-treeview {{ Request::is('admin/*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('admin/*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Manajemen User
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('role.index') }}"
                            class="nav-link {{ Request::is('admin/role*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Role</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}"
                            class="nav-link {{ Request::is('admin/user*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('log_monitoring', Model::class)
            <li class="nav-item has-treeview {{ Request::is('log/*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('log/*') ? 'active' : '' }}">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>
                        Log Monitoring
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('logActivity.index') }}"
                            class="nav-link {{ Request::is('log/logActivity*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Activity</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logSystem.index') }}"
                            class="nav-link {{ Request::is('log/logSystem*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>System</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>