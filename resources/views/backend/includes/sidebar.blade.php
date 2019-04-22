<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/dashboard')) }}"
                   href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    @lang('menus.backend.sidebar.dashboard')
                </a>
            </li>

            <li class="nav-title">
                @lang('menus.backend.sidebar.system')
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-people"></i> Pengelolaan Sivitas</a>
                <ul class="nav-dropdown-items">

                    {{-- Menu Dosen--}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dosen.index') }}">
                            <i class="nav-icon fas fa-minus"></i> Dosen
                        </a>
                    </li>

                    {{-- Menu Mahasiswa--}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.mahasiswa.index') }}">
                            <i class="nav-icon fas fa-minus"></i> Mahasiswa
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item nav-dropdown">

                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-user-follow"></i> Pengelolaan User</a>
                <ul class="nav-dropdown-items">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.permissions.index') }}">
                            <i class="nav-icon fas fa-minus"></i> Permissions
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.roles.index') }}">
                            <i class="nav-icon fas fa-minus"></i> Roles
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.index') }}">
                            <i class="nav-icon fas fa-minus"></i> Users
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
