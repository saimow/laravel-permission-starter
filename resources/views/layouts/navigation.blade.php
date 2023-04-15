<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Dashboard') }}
        </a>
    </li>

    <li class="nav-item nav-group">
        <a class="nav-link nav-group-toggle" >
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-briefcase') }}"></use>
            </svg>
            User Management
        </a>
        <ul class="nav-group-items">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.permissions.index') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                    </svg>
                    Permissions
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.roles.index') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-shield-alt') }}"></use>
                    </svg>
                    Roles
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg>
                    Users
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.posts.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-short-text') }}"></use>
            </svg>
            {{ __('Posts') }}
        </a>
    </li>

</ul>