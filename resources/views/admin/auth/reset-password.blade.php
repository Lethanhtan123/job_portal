{{-- <x-guest-layout>

    <h1>admin reset</h1>
    <form method="POST" action="{{ route('admin.password.store') }}">

        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@section('admin.ayth.layouts.auth-master')
@section('contents')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Cập nhật lại mật khẩu</h4>
                        </div>

                        <div class="card-body">
                            <p class="text-muted">Chúng tôi sẽ gửi cho bạn 1 link để cập nhật lại mật khẩu.</p>
                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <form method="POST" action="{{ route('admin.password.store') }}">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" value={{ old('email', $request->email) }}type="email"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                                        tabindex="1" required autofocus>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="form-group">
                                    <label for="password">Mật khẩu mới</label>
                                    <input id="password" type="password"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                        data-indicator="pwindicator" name="password" tabindex="2" required>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                </div>

                                <div class="form-group">
                                    <label for="password-confirm">Xác nhận mật khẩu</label>
                                    <input id="password-confirm" type="password" class="form-control {{ $errors->has('email')?'is-invalid':'' }}"
                                        name="password_confirmation" tabindex="2" required>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Cập nhật lại mật khẩu
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; T&T {{ date('Y') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
