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
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Bảng điều kiển</span></a>

            </li>
            <li class="menu-header">Starter</li>
            <li class="dropdown

            {{ setSidebarActive(
                ['admin.industry-types.*',
                'admin.organization-types.*',
                'admin.languages.*',
                'admin.professions.*',
                'admin.skills.*',

                ] ) }}
            ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Thuộc tính</span></a>
                <ul class="dropdown-menu">

                    <li><a class="{{ setSidebarActive(['admin.industry-types.*']) }} nav-link"
                            href="{{ route('admin.industry-types.index') }}">Loại doanh nghiệp</a></li>

                    {{-- <li><a class="{{ setSidebarActive(['admin.organization-types.*']) }} nav-link"
                            href="{{ route('admin.organization-types.index') }}">Organization types</a></li> --}}
                    <li><a class="{{ setSidebarActive(['admin.languages.*']) }} nav-link"
                            href="{{ route('admin.languages.index') }}">Ngôn ngữ</a></li>
                    <li><a class="{{ setSidebarActive(['admin.professions.*']) }} nav-link"
                            href="{{ route('admin.professions.index') }}">Công việc</a></li>

                    <li><a class="{{ setSidebarActive(['admin.skills.*']) }} nav-link"
                            href="{{ route('admin.skills.index') }}">Kỹ năng</a></li>

                </ul>
            </li>

            <li class="dropdown

            {{ setSidebarActive(
                ['admin.country.*',
                'admin.state.*',
                'admin.city.*'] ) }}
            ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Vị trí, địa điểm</span></a>
                <ul class="dropdown-menu">
                    <li><a class="{{ setSidebarActive(['admin.country.*']) }} nav-link"
                            href="{{ route('admin.country.index') }}">Quốc gia</a></li>
                    {{-- <li><a class="{{ setSidebarActive(['admin.state.*']) }} nav-link"
                            href="{{ route('admin.state.index') }}">State</a></li> --}}
                    <li><a class="{{ setSidebarActive(['admin.city.*']) }} nav-link"
                            href="{{ route('admin.city.index') }}">Thành phố</a></li>

                    <li><a class="{{ setSidebarActive(['admin.district.*']) }} nav-link"
                            href="{{ route('admin.district.index') }}">Quận/huyện</a></li>
                </ul>
            </li>


            <li class="dropdown

            {{ setSidebarActive(
                ['admin.job-categories.*',
                'admin.educations.*',
                'admin.salary-types.*',
                'admin.job-types.*',
                'admin.job-roles.*',
                'admin.job-experiences.*',
                'admin.job-tags.*'
                ] ) }}
            ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Thuộc tính tuyển dụng</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.job-categories.*']) }}">
                        <a href="{{ route('admin.job-categories.index') }}" class="">
                            <span>Loại nghành</span></a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.educations.*']) }}">
                        <a href="{{ route('admin.educations.index') }}" class="">
                            <span>Học vấn</span></a>
                    </li>

                    <li class="{{ setSidebarActive(['admin.job-types.*']) }}">
                        <a href="{{ route('admin.job-types.index') }}" class="">
                            <span>Loại công việc</span></a>
                    </li>

                    <li class="{{ setSidebarActive(['admin.salary-types.*']) }}">
                        <a href="{{ route('admin.salary-types.index') }}" class="">
                            <span>Loại lương</span></a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.job-roles.*']) }}">
                        <a href="{{ route('admin.job-roles.index') }}" class="">
                            <span>Chức vụ</span></a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.job-experiences.*']) }}">
                        <a href="{{ route('admin.job-experiences.index') }}" class="">
                            <span>Kinh nghiệm công việc</span></a>
                    </li>

                    <li class="{{ setSidebarActive(['admin.job-tags.*']) }}">
                        <a href="{{ route('admin.job-tags.index') }}" class="">
                            <span>Tag (tuyển dụng)</span></a>
                    </li>
                </ul>
            </li>


            <li class="{{ setSidebarActive(['admin.jobs.*']) }}">
                <a href="{{ route('admin.jobs.index') }}" class="">
                    <i class="fas fa-columns"></i>
                    <span>Tin tuyển dụng</span></a>
            </li>

            <li class="{{ setSidebarActive(['admin.blogs.*']) }}">
                <a href="{{ route('admin.blogs.index') }}" class="">
                    <i class="fas fa-columns"></i>
                    <span>Tin tức</span></a>
            </li>

            <li class="{{ setSidebarActive(['admin.hero.index.*']) }}">
                <a href="{{ route('admin.hero.index') }}" class="">
                    <i class="fas fa-columns"></i>
                    <span>Tìm kiếm trang chủ</span></a>
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
                    this.closest('form').submit();" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
