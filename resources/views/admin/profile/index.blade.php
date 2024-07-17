@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Trang cá nhân</h1>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Cập nhật trang cá nhân</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <x-image-preview :height="200" :width="300" :source="$admin?->image" />
                                <div class="mt-2"></div>
                                <label for="">Ảnh đại diện</label>
                                <input type="file" class="form-control {{ hasError($errors, 'image') }}" name="image">
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>

                            <div class="form-group">
                                <label for="">Tên</label>
                                <input type="text" class="form-control {{ hasError($errors, 'name') }}" name="name" value="{{ old('name', $admin->name) }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control {{ hasError($errors, 'email') }}" name="email" value="{{ old('email', $admin->email) }}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Cập nhật mật khẩu</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.profile-password.update') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group icon-side">
                                        <label for="">Mật khẩu</label>
                                        <input type="password" class="form-control {{ hasError($errors, 'password') }}" name="password"
                                            value="{{ old('password') }}">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        {{-- <i class="fa-regular fa-eye" id="togglePasswordCom"></i> --}}

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group icon-side">
                                        <label for="">Nhập lại mật khẩu</label>
                                        <input type="password" class="form-control {{ hasError($errors, 'password_confirmation') }}"
                                            name="password_confirmation" value="{{ old('password_confirmation') }}">
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                                            {{-- <i class="fa-regular fa-eye" id="togglePasswordComCf"></i> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

{{-- @push('scripts')
    <script>
        window.addEventListener("DOMContentLoaded", function() {
            const togglePassword = document.querySelector("#togglePasswordCom");
            const togglePasswordCf = document.querySelector("#togglePasswordComCf");
            const password = document.querySelector("#password_com");
            const passwordConfirm = document.querySelector("#password_com_cf");

            togglePassword.addEventListener("click", function(e) {
                // toggle the type attribute
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);
                // toggle the eye / eye slash icon
                this.classList.toggle("fa-eye-slash");
            });

            togglePasswordCf.addEventListener("click", function(e) {
                // toggle the type attribute
                const typeCf = passwordConfirm.getAttribute("type") === "password" ? "text" : "password";
                passwordConfirm.setAttribute("type", typeCf);
                // toggle the eye / eye slash icon
                this.classList.toggle("fa-eye-slash");
            });
        });

    </script>
@endpush --}}
