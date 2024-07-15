<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo peShiner">
                    @php
                        $logo = \App\Models\Footer::first();

                    @endphp
                    <a class="footer_logo" href="{{ route('home') }}">
                        <img alt="dreamjob" src="{{ $logo?->logo }}">
                    </a>
                </div>
            </div>
            <div class="header-nav">
                <nav class="nav-main-menu">
                    <ul class="main-menu">
                        <li class="has-children"><a class="active" href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="has-children"><a href="{{ route('jobs.index') }}">Tin Tuyển Dụng</a></li>
                        <li class="has-children"><a href="{{ route('companies.index') }}">Nhà Tuyển Dụng</a></li>
                        <li class="has-children"><a href="{{ route('candidates.index') }}">Ứng Viên</a></li>
                        <li class="has-children"><a href="{{ route('blogs.index') }}">Tin tức</a></li>
                    </ul>
                </nav>
                <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
                        class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
            </div>
            <div class="header-right">
                <div class="block-signin">
                    <!-- <a class="text-link-bd-btom hover-up" href="page-register.html">Register</a> -->
                    @guest
                    <a class="ml-40 btn btn-default btn-shadow hover-up" href="{{ route('login') }}">Đăng nhập</a>
                    @endguest

                    @auth
                        @if (auth()->user()->role === 'company')
                            <a class="ml-40 btn btn-default btn-shadow hover-up" style="width:250px"
                                href="{{ route('company.dashboard') }}">Trang cá nhân</a>
                        @elseif (auth()->user()->role === 'candidate')
                        <a class="ml-40 btn btn-default btn-shadow hover-up" style="min-width:250px"
                        href="{{ route('candidate.dashboard') }}">Trang cá nhân</a>
                        @endif
                    @endauth

                </div>
            </div>

            {{-- <div class="">
                <div class="box_changelang ggdich_intro">
                    <div class="lang_current">
                        <img class=" me-2" src="assets/images/flag-v.png" alt="">
                        <p class="mb-0 " id="lang_txt">Việt Nam</p>
                        <div class="box_so"><i class="fa-solid fa-chevron-down"></i></div>
                    </div>
                    <div class="box_solang">
                        <a class="lang-v text-decoration-none"
                            onclick="doGoogleLanguageTranslator('vi|vi'); return false;"
                            data-photo="assets/images/flag-v.png" data-lang="Việt Nam" title="Việt Nam">
                            Việt Nam
                        </a>
                        <a class="text-decoration-none" onclick="doGoogleLanguageTranslator('vi|en'); return false;"
                            title="Tiếng Anh" data-photo="assets/images/flag-e.png" data-lang="Tiếng Anh">
                            Tiếng Anh
                        </a>
                        <a class="text-decoration-none" onclick="doGoogleLanguageTranslator('vi|jp'); return false;"
                            data-lang="Tiếng Nhật" data-photo="assets/images/flag-j.png" title="Tiếng Nhật">
                            Tiếng Nhật
                        </a>
                        <a class="text-decoration-none" onclick="doGoogleLanguageTranslator('vi|ko'); return false;"
                            title="Tiếng Hàn" data-photo="assets/images/flag-k.png" data-lang="Tiếng Hàn">
                            Tiếng Hàn
                        </a>
                        <a class="text-decoration-none" onclick="doGoogleLanguageTranslator('vi|zh-CN'); return false;"
                            title="Tiếng Trung" data-photo="assets/images/flag-c.png" data-lang="Tiếng Trung">
                            Tiếng Trung
                        </a>
                    </div>
                    <div id="google_language_translator"></div>
                </div>

            </div> --}}
        </div>
    </div>
</header>

<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
            <div class="perfect-scroll">
                <div class="mobile-search mobile-header-border mb-30">
                    <form action="#">
                        <input type="text" placeholder="Search…"><i class="fi-rr-search"></i>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start-->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="has-children"><a class="active" href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="has-children"><a href="{{ route('jobs.index') }}">Tin Tuyển Dụng</a></li>
                            <li class="has-children"><a href="{{ route('companies.index') }}">Nhà Tuyển Dụng</a></li>
                            <li class="has-children"><a href="{{ route('candidates.index') }}">Ứng Viên</a></li>
                            <li class="has-children"><a href="{{ route('blogs.index') }}">Tin tức</a></li>
                            <li class="has-children">
                                @guest
                                    <a class="" href="{{ route('login') }}">Đăng
                                        nhập</a>
                                @endguest

                                @auth
                                    @if (auth()->user()->role === 'company')
                                        <a class="" style="width:250px" href="{{ route('company.dashboard') }}">Trang
                                            cá nhân</a>
                                    @elseif (auth()->user()->role === 'candidate')
                                        <a class="" style="min-width:250px"
                                            href="{{ route('candidate.dashboard') }}">Trang cá nhân</a>
                                    @endif
                                @endauth
                            </li>
                        </ul>
                    </nav>
                </div>
                @php
                    $footerDetails = \App\Models\Footer::first();
                @endphp
                <div class="mt-3 text-center site-copyright">&copy; Copyright 2024 {{ $footerDetails?->copyright }}.
                    All rights reserved.</div>
            </div>
        </div>
    </div>
</div>

