<div class="tab-pane fade show" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
    <form action=" {{ route('candidate.profile.account-info.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-3">Địa chỉ</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group select-style">
                            <label class="mb-10 font-md text-capitalize color-text-mutted">Quốc gia *</label>
                            <select name="country" id=""
                                class="{{ hasError($errors, 'country') }} country form-control form-icons select-active">
                                <option value=""> Chọn quốc gia </option>
                                @foreach ($countries as $country)
                                    <option @selected($country->id === $candidate?->country) value="{{ $country->id }}">
                                        {{ $country->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group select-style">
                            <label class="mb-10 font-md text-capitalize color-text-mutted">Tỉnh/Thành phố</label>
                            <select name="city" id="city"
                                class="{{ hasError($errors, 'city') }} city form-control form-icons select-active">
                                <option value=""> Chọn tỉnh/thành phố </option>
                                @foreach ($cities as $city)
                                    <option @selected($city->id === $candidate?->city) value="{{ $city->id }}">
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group select-style">
                            <label class="mb-10 font-md text-capitalize color-text-mutted">Quận/Huyện</label>
                            <select name="district" id=""
                                class="{{ hasError($errors, 'district') }} district form-control form-icons select-active">
                                <option value=""> Chọn quận/huyện </option>
                                @foreach ($districts as $district)
                                    <option @selected($district->id === $candidate?->district) value="{{ $district->id }}">
                                        {{ $district->name }}
                                    </option>
                                @endforeach

                            </select>
                            <x-input-error :messages="$errors->get('district')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="mb-10 font-md text-capitalize color-text-mutted">Địa chỉ
                            </label>
                            <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }} "
                                type="text" value="{{ $candidate?->address }}" name="address">
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <h4 class="mb-3">Thông tin liên hệ</h4>
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="mb-10 font-md text-capitalize color-text-mutted">Số điện thoại 1
                            </label>
                            <input class="form-control {{ $errors->has('phone_one') ? 'is-invalid' : '' }} "
                                type="number" value="{{ $candidate?->phone_one }}" name="phone_one">
                            <x-input-error :messages="$errors->get('phone_one')" class="mt-2" />
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="mb-10 font-md text-capitalize color-text-mutted"> Số Zalo
                            </label>
                            <input class="form-control {{ $errors->has('phone_two') ? 'is-invalid' : '' }} "
                                type="number" value="{{ $candidate?->phone_two }}" name="phone_two">
                            <x-input-error :messages="$errors->get('phone_two')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="mb-10 font-md text-capitalize color-text-mutted">Email
                            </label>
                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} " type="email"
                                value="{{ $candidate?->email }}" name="email">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="box-button mt-15 w-50">
            <button class="font-bold btn btn-apply-big font-md">Lưu tất cả thay đổi</button>
        </div>
    </form>

    <div class="w-login-email mt-4">
        <h4 class="mb-3">Thông tin đăng nhập</h4>
        <form action="{{ route('candidate.profile.account-email.update') }}" method="POST">
            @csrf
            <div class="form-group w-100">
                <label class="mb-10 font-md text-capitalize color-text-mutted">Email</label>
                <input class="form-control {{ $errors->has('account_email') ? 'is-invalid' : '' }} " type="email"
                    value="{{ auth()->user()->email }}" name="account_email">
                <x-input-error :messages="$errors->get('account_email')" class="mt-2" />
            </div>
            <div class="box-button mt-15 w-50">
                <button class="font-bold btn btn-apply-big font-md">Lưu tất cả thay đổi</button>
            </div>
        </form>
        <div class="mt-4">
            <form action="{{ route('candidate.profile.account-password.update') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group icon-side">
                            <label class="form-label" for="input-4">Mật khẩu</label>
                            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                id="pass-acc" type="password" required="" name="password"
                                placeholder="************">
                            <i class="fa-regular fa-eye" id="togglePassword"></i>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group icon-side">
                            <label class="form-label" for="input-5">Xác nhận mật khẩu *</label>
                            <input
                                class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                id="cf-pass-acc" type="password" required="" name="password_confirmation"
                                placeholder="************">
                            <i class="fa-regular fa-eye" id="togglePasswordCf"></i>

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>
                </div>

                <div class="box-button mt-15 w-50">
                    <button class="font-bold btn btn-apply-big font-md">Lưu tất cả thay đổi</button>
                </div>
            </form>
        </div>

    </div>


</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.country').on('change', function() {
                let country_id = $(this).val();
                // remove all previous cities
                $('.district').html("");

                $.ajax({
                    mehtod: 'GET',
                    url: '{{ route("get-cities", ":id") }}'.replace(":id", country_id),
                    data: {},
                    success: function(response) {
                        let html = '';

                        $.each(response, function(index, value) {
                            html +=
                                `<option value="${value.id}" >${value.name}</option>`
                        });

                        $('.city').html(html);
                    },
                    error: function(xhr, status, error) {}
                })
            })

            // get cities
            $('.city').on('change', function() {
                let city_id = $(this).val();

                $.ajax({
                    mehtod: 'GET',
                    url: '{{ route("get-districts", ":id") }}'.replace(":id", city_id),
                    data: {},
                    success: function(response) {
                        let html = '';

                        $.each(response, function(index, value) {
                            html +=
                                `<option value="${value.id}" >${value.name}</option>`
                        });

                        $('.district').html(html);
                    },
                    error: function(xhr, status, error) {}
                })
            })
        });

        window.addEventListener("DOMContentLoaded", function() {
            const togglePassword = document.querySelector("#togglePassword");
            const togglePasswordCf = document.querySelector("#togglePasswordCf");
            const password = document.querySelector("#pass-acc");
            const passwordConfirm = document.querySelector("#cf-pass-acc");

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
@endpush
