<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown {{ setSidebarActive(['admin.dashboard']) }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>

            </li>
            <li class="menu-header">Starter</li>
            <li class="dropdown

            {{ setSidebarActive(
                ['admin.industry-types.*',
                'admin.organization-types.*'] ) }}
            ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Actributes</span></a>
                <ul class="dropdown-menu">

                    <li><a class="{{ setSidebarActive(['admin.industry-types.*']) }} nav-link" href="{{ route('admin.industry-types.index') }}">Industry types</a></li>

                    {{-- <li><a class="{{ setSidebarActive(['admin.organization-types.*']) }} nav-link" href="{{ route('admin.organization-types.index') }}">Organization types</a></li> --}}
                    {{-- <li><a class="{{ setSidebarActive(['admin.languages.*']) }} nav-link" href="{{ route('admin.languages.index') }}">Languages</a></li> --}}
                    <li><a class="{{ setSidebarActive(['admin.professions.*']) }} nav-link" href="{{ route('admin.professions.index') }}">Professions</a></li>

                    <li><a class="{{ setSidebarActive(['admin.skills.*']) }} nav-link" href="{{ route('admin.skills.index') }}">Skills</a></li>

                </ul>
            </li>

            <li class="dropdown

            {{ setSidebarActive(
                ['admin.country.*',
                'admin.state.*',
                'admin.city.*'] ) }}
            ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Location</span></a>
                <ul class="dropdown-menu">
                    <li><a class="{{ setSidebarActive(['admin.country.*']) }} nav-link" href="{{ route('admin.country.index') }}">Countries</a></li>
                    <li><a class="{{ setSidebarActive(['admin.state.*']) }} nav-link" href="{{ route('admin.state.index') }}">State</a></li>
                    <li><a class="{{ setSidebarActive(['admin.city.*']) }} nav-link" href="{{ route('admin.city.index') }}">City</a></li>
                </ul>
            </li>
        </ul>

        {{-- <div class="p-3 mt-4 mb-4 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> --}}
    </aside>
</div>

<nav class="navbar navbar-expand-lg main-navbar">
    <form class="mr-auto form-inline">
        <ul class="mr-3 navbar-nav">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
            </li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>

    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Messages
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-message">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-avatar">
                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle">
                            <div class="is-online"></div>
                        </div>
                        <div class="dropdown-item-desc">
                            <b>Kusnaedi</b>
                            <p>Hello, Bro!</p>
                            <div class="time">10 Hours Ago</div>
                        </div>
                    </a>
                </div>
                <div class="text-center dropdown-footer">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="text-white dropdown-item-icon bg-primary">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            Template update is available now!
                            <div class="time text-primary">2 Min Ago</div>
                        </div>
                    </a>

                </div>
                <div class="text-center dropdown-footer">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="assets/img/avatar/avatar-1.png" class="mr-1 rounded-circle">
                <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <a href="features-profile.html" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>

                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf

                    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                    this.closest('form').submit();"class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
