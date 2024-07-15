@extends('fontend.layouts.master')

@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Đặt lại mật khẩu</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Trang chủ</a></li>
                            <li>Đặt lại mật khẩu</li>
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
                            <h2 class="mt-10 mb-5 text-brand-1">Đặt lại mật khẩu!</h2>
                            <p class="font-sm text-muted mb-30">Đặt lại mật khẩu của bạn? Không có vấn đề gì. Chỉ cần cho chúng tôi biết địa chỉ email của bạn và chúng tôi sẽ gửi cho bạn một liên kết đặt lại mật khẩu qua email để cho phép bạn chọn đặt lại mật khẩu mới.
                            </p>
                        </div>
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form class="login-register text-start mt-20" method="POST" action="{{ route('password.store') }}">
                            @csrf

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="form-group">
                                <label for="input_l">Email *</label>
                                <input class="form-control " id="input-1" type="email" required="" name="email"
                                    value="{{ old('email', $request->email) }}" placeholder="Email" readonly>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="form-group">
                                <label for="input_l">Mật khẩu *</label>
                                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                    id="input-2" type="password" required="" name="password" placeholder="*****">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="form-group">
                                <label for="input_l">Xác nhận mật khẩu *</label>
                                <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                    id="input-3" type="password" required="" name="password_confirmation"
                                    placeholder="*****">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="form-group">
                                <button class="btn btn-default hover-up w-100" type="submit"
                                    name="continue">Tiếp tục</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mt-120"></div>
@endsection
