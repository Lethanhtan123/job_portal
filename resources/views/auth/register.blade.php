@extends('fontend.layouts.master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Đăng ký</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Đăng ký</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-120 login-register">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-6 col-md-6 col-sm-12">
                    <div class="login-register-cover">
                        <div class="text-center">
                            <h2 class="mb-5 text-brand-1">Đăng ký</h2>

                            <p class="font-sm text-muted mb-30">Bạn chưa có tài khoản? ,Tạo một cái nào.</p>

                        </div>
                        <form class="mt-20 login-register text-start" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">

                                        <label class="form-label" for="input-1">Tên  *</label>

                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            id="input-1" type="text" required="" name="name"
                                            placeholder="Họ tên" value="{{ old('name') }}">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-2">Email *</label>
                                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            id="input-2" type="email" required="" name="email"
                                            placeholder="Email" value="{{ old('email') }}">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group icon-side">
                                        <label class="form-label" for="input-4">Mật khẩu *</label>
                                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                            id="input-4" type="password" required="" name="password"
                                            placeholder="************">
                                        <i class="fa-regular fa-eye" id="togglePassword"></i>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group icon-side">
                                  <label class="form-label" for="input-5">Nhập lại mật khẩu *</label>

                                        <input
                                            class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                            id="input-5" type="password" required="" name="password_confirmation"
                                            placeholder="************">
                                        <i class="fa-regular fa-eye" id="togglePasswordCf"></i>

                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <hr>

                                    <h6 for="" class="mb-2">Chọn loại tài khoản</h6>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="account_type"
                                            id="typeCandidate" value="candidate">
                                        <label class="form-check-label" for="typeCandidate">Ứng viên</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="account_type" id="typeCompany"
                                            value="company">

                                        <label class="form-check-label" for="typeCompany">Doanh nghiệp</label>

                                    </div>

                                    @if ($errors->has('account_type'))
                                        <div class="invalid-feedback d-block">
                                            {{ $errors->first('account_type') }}
                                        </div>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <button class="btn btn-default hover-up w-100" type="submit" name="login">Đăng ký</button>
                                </div>

                                <div class="text-center text-muted">Tôi đã có tài khoản?

                                    <a href="{{ route('login') }}">Đăng nhập</a>
                                </div>
                        </form>
                        {{-- <div class="mt-20 text-center">
                            <div class="divider-text-center"><span>Or continue with</span></div>
                            <button class="mt-20 btn social-login hover-up"><img
                                    src="assets/imgs/template/icons/icon-google.svg" alt="joblist"><strong>Sign up with
                                    Google</strong></button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mt-120"></div>
@endsection

@push('scripts')
    <script>
        window.addEventListener("DOMContentLoaded", function() {
            const togglePassword = document.querySelector("#togglePassword");
            const togglePasswordCf = document.querySelector("#togglePasswordCf");
            const password = document.querySelector("#input-4");
            const passwordConfirm = document.querySelector("#input-5");

            togglePassword.addEventListener("click", function(e) {
                // toggle the type attribute
                const type =  password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);
                // toggle the eye / eye slash icon
                this.classList.toggle("fa-eye-slash");
            });

            togglePasswordCf.addEventListener("click", function(e) {
                // toggle the type attribute
                const typeCf =  passwordConfirm.getAttribute("type") === "password" ? "text" : "password";
                passwordConfirm.setAttribute("type", typeCf);
                // toggle the eye / eye slash icon
                this.classList.toggle("fa-eye-slash");
            });
        });
    </script>
@endpush
