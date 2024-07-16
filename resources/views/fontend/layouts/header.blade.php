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
                        @auth
                            @if (auth()->user()->role === 'company')
                                <li class="has-children"><a href="{{ route('candidates.index') }}">Ứng Viên</a></li>
                            @endif
                        @endauth
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
                             @auth
                            @if (auth()->user()->role === 'company')
                                <li class="has-children"><a href="{{ route('candidates.index') }}">Ứng Viên</a></li>
                            @endif
                        @endauth
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



@push('scripts')

<script type="text/javascript">
   $(document).ready(function() {
    if ($(".lang_current").length > 0) {
        $(".lang_current").click(function(event) {
            $(".box_changelang .box_solang").slideToggle();
        });
    }

    $('.box_solang a').on("click", function() {
        let $act = $(this).toggleClass('active');
        var lang = $(this).data('lang');
        var photo = $(this).attr('data-photo');
        $('.box_solang a').not($act).removeClass('active');
        $("#lang_txt").text(lang); // Sử dụng text() thay vì innerHTML để tránh lỗi khi không có giá trị
        $('.lang-v').removeClass('lang-v');
        $('.lang_current img').attr('src', photo);
    });

    function GoogleLanguageTranslatorInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'vi',
            autoDisplay: false
        }, 'google_language_translator');
    }
    function GTranslateFireEvent(a, b) {
        try {
            if (document.createEvent) {
                var c = document.createEvent("HTMLEvents");
                c.initEvent(b, true, true);
                a.dispatchEvent(c);

            } else {
                var c = document.createEventObject();
                a.fireEvent('on' + b, c);
            }
        } catch (e) {}
    }

    function doGoogleLanguageTranslator(a) {
        console.log('Selected language:', lang);
        if (a.value) a = a.value;
        if (a == '') return;
        var b = a.split('|')[1];
        var c;
        var d = document.getElementsByTagName('select');
        for (var i = 0; i < d.length; i++)
            if (d[i].className == 'goog-te-combo') c = d[i];
        if (document.getElementById('google_language_translator') == null || document.getElementById('google_language_translator').innerHTML.length == 0 || c.length == 0 || c.innerHTML.length == 0) {
            setTimeout(function() {
                    doGoogleLanguageTranslator(a)
                },
                100)
        } else {
            c.value = b;
            GTranslateFireEvent(c, 'change');
            GTranslateFireEvent(c, 'change');
            if (b == 'km') {
                $('.hotline-header').addClass('fs');
            }
        }
    }

});

</script>

@endpush

