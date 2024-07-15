@extends('fontend.layouts.master')

@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Quên mật khẩu</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Trang chủ</a></li>
                            <li>Quên mật khẩu</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-120 login-register">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12 mx-auto">
                    <div class="login-register-cover">

                        <!-- Session Status -->

                        <div class="text-center">
                            <h2 class="mt-10 mb-5 text-brand-1">Quên mật khẩu!</h2>
                            <p class="font-sm text-muted mb-30">Quên mật khẩu? Không vấn đề gì. Chỉ cần cho chúng tôi biết địa chỉ email của bạn và chúng tôi sẽ gửi cho bạn một liên kết đặt lại mật khẩu qua email để cho phép bạn chọn đặt lại mật khẩu mới.</p>
                        </div>
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <form class="login-register text-start mt-20" method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <input class="form-control" id="input-1" type="text" required="" name="email"
                                    value="{{ old('email') }}" placeholder="Email">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="form-group">
                                <button class="btn btn-default hover-up w-100" type="submit"
                                    name="continue">Tiếp tục</button>
                            </div>
                            {{-- <div class="text-muted text-center">Bạn chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký</a></div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mt-120"></div>
@endsection
