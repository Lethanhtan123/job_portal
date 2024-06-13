@extends('fontend.layouts.master')

@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Đăng nhập</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Đăng nhập</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-120 login-register">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-5 col-md-6 col-sm-12">
                    <div class="login-register-cover">

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <div class="text-center">
                            <h2 class="mb-5 text-brand-1">Đăng nhập</h2>
                            <p class="font-sm text-muted mb-30">Vui lòng cung cấp thông tin xác thực hợp lệ của bạn.</p>
                        </div>
                        <form class="mt-20 login-register text-start" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-3">Email *</label>
                                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            id="input-3" type="email" required="" name="email"
                                            placeholder="stevenjob" value="{{ old('email') }}">

                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group icon-side">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="password">Mật khẩu *</label>
                                            <a href="{{ route('password.request') }}">Quân mật khẩu?</a>
                                        </div>
                                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                            id="input-4" type="password" required="" name="password"
                                            placeholder="************">
                                        <i class="fa-regular fa-eye" id="togglePassword"></i>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-check form-group form-check-inline">
                                        <input class="form-check-input" style="margin-right: 10px" type="checkbox"
                                            name="remember">
                                        <label class="form-check-label" for="typeCandidate"> Remember me</label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <button class="btn btn-default hover-up w-100" type="submit" name="login">Đăng nhập</button>
                            </div>
                            <div class="text-center text-muted">Bạn chưa có tài khoản?
                                <a href="{{ route('register') }}">Đăng ký</a>
                            </div>
                        </form>
                        {{-- <div class="mt-20 text-center">
              <div class="divider-text-center"><span>Or continue with</span></div>
              <button class="mt-20 btn social-login hover-up"><img src="assets/imgs/template/icons/icon-google.svg"
                  alt="joblist"><strong>Sign up with Google</strong></button>
            </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        window.addEventListener("DOMContentLoaded", function() {
            const togglePassword = document.querySelector("#togglePassword");
            const password = document.querySelector("#input-4");

            togglePassword.addEventListener("click", function(e) {
                // toggle the type attribute
                const type =  password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);
                // toggle the eye / eye slash icon
                this.classList.toggle("fa-eye-slash");
            });
        });
    </script>
@endpush

