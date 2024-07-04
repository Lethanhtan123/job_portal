@extends('fontend.layouts.master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Thông tin cá nhân</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Trang cá nhân</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                @include('fontend.company-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">

                    <ul class="mb-3 nav nav-pills nav-cus" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Thông tin doanh nghiệp</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Thông tin thành lập</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Cài đặt tài khoản</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <form action=" {{ route('company.profile.company-info') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-2 box-avt">
                                            <x-image-preview :height="200" :width="200" :source="$companyInfo?->logo" />
                                        </div>
                                        <div class="btm-box-avt">
                                            <div class="form-group">
                                                <label class="mb-10 font-sm text-capitalize color-text-mutted">Logo *
                                                </label>
                                                <input class="form-control  {{ $errors->has('logo') ? 'is-invalid' : '' }} "
                                                    type="file" value="" name="logo">
                                                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2 box-avt">
                                            <x-image-preview :height="200" :width="400" :source="$companyInfo?->banner" />
                                        </div>
                                        <div class="btm-box-avt">
                                            <div class="form-group">
                                                <label class="mb-10 font-sm text-capitalize color-text-mutted">Ảnh nền *
                                                </label>
                                                <input
                                                    class="form-control  {{ $errors->has('banner') ? 'is-invalid' : '' }} "
                                                    type="file" value="" name="banner">
                                                <x-input-error :messages="$errors->get('banner')" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="mb-10 font-sm text-capitalize color-text-mutted">Tên doanh nghiệp
                                                *
                                            </label>
                                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} "
                                                type="text" value="{{ $companyInfo?->name }}" name="name">
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="mb-10 font-sm text-capitalize color-text-mutted">Mô tả doanh
                                                nghiệp *
                                            </label>
                                            <textarea name="bio" class="  {{ $errors->has('bio') ? 'is-invalid' : '' }}  summernote">{{ $companyInfo?->bio }}</textarea>
                                            <x-input-error :messages="$errors->get('bio')" class="mt-2" />

                                        </div>
                                    </div>
                                </div>
                                <div class="box-button mt-15">
                                    <button class="font-bold btn btn-apply-big font-md">Lưu thay đổi</button>
                                </div>

                            </form>
                        </div>


                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <form action="{{ route('company.profile.founding-info') }}" method="POST">
                                @csrf
                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-10 font-sm color-text-mutted">Năm thành lập</label>
                                            <input id="inputdate" type="date" name="establishment_date"
                                                class="form-control datepicker {{ $errors->has('establishment_date') ? 'is-invalid' : '' }}"
                                                value="{{ $companyInfo?->establishment_date }}">
                                            <x-input-error :messages="$errors->get('establishment_date')" class="mt-2" />

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-10 font-sm color-text-mutted">Website</label>
                                            <input type="text" name="website"
                                                class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}"
                                                value="{{ $companyInfo?->website }}">
                                            <x-input-error :messages="$errors->get('website')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-10 font-sm color-text-mutted">Email *</label>
                                            <input type="email" name="email"
                                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                value="{{ $companyInfo?->email }}">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-10 font-sm color-text-mutted">Điện thoại *</label>
                                            <input type="text" name="phone"
                                                class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                                value="{{ $companyInfo?->phone }}">
                                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-10 font-sm color-text-mutted">Số Zalo</label>
                                            <input type="text" name="zalo"
                                                class="form-control {{ $errors->has('zalo') ? 'is-invalid' : '' }}"
                                                value="{{ $companyInfo?->zalo }}">
                                            <x-input-error :messages="$errors->get('zalo')" class="mt-2" />

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group select-style">
                                            <label class="mb-10 font-sm color-text-mutted">Quốc gia *</label>
                                            <select name="country" id=""
                                                class="form-control form-icons country select-active {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                                value="{{ $companyInfo?->country }}">
                                                <option value="">Select</option>
                                                @foreach ($Country as $item)
                                                    <option @selected($item->id === $companyInfo?->country) value="{{ $item->id }}">
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('country')" class="mt-2" />

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group select-style">
                                            <label class="mb-10 font-sm color-text-mutted">Thành phố *</label>
                                            <select name="city" id=""
                                                class="{{ hasError($errors, 'city') }} city form-control form-icons select-active">
                                                <option value="">Chọn tỉnh/thành phố </option>
                                                @foreach ($cities as $city)
                                                    <option @selected($city->id === $companyInfo?->city) value="{{ $city->id }}">
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('city')" class="mt-2" />

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group select-style">
                                            <label class="mb-10 font-sm color-text-mutted">Quận/huyện *</label>
                                            <select name="district" id=""
                                                class="form-control form-icons district select-active {{ $errors->has('district') ? 'is-invalid' : '' }}"
                                                value="{{ $companyInfo?->districts }}">
                                                <option value=""> Chọn quận/huyện</option>
                                                @foreach ($districts as $item)
                                                    <option @selected($item->id === $companyInfo?->district) value="{{ $item->id }}">
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('district')" class="mt-2" />

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group select-style">
                                            <label class="mb-10 font-sm color-text-mutted">Loại doanh nghiệp *</label>
                                            <select name="industry_type_id" id=""
                                                class="form-control form-icons industry_type_id select-active {{ $errors->has('industry_type_id') ? 'is-invalid' : '' }}">
                                                <option value="">Select</option>
                                                @foreach ($IndustryType as $item)
                                                    <option @selected($item->id === $companyInfo?->industry_type_id) value="{{ $item->id }}">
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('industry_type')" class="mt-2" />
                                        </div>
                                    </div>



                                    {{-- <div class="col-md-6">
                                        <div class="form-group select-style">
                                            <label class="mb-10 font-sm color-text-mutted">State *</label>
                                            <select name="state" id=""
                                                class="form-control form-icons state select-active {{ $errors->has('state') ? 'is-invalid' : '' }}"
                                                value="{{ $companyInfo?->state }}">
                                                <option value="">Select</option>
                                                @foreach ($State as $item)
                                                    <option @selected($item->id === $companyInfo?->statem) value="{{ $item->id }}">
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('city')" class="mt-2" />

                                        </div>
                                    </div> --}}

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="mb-10 font-sm color-text-mutted">Địa chỉ</label>
                                            <input type="text" name="address"
                                                class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                                value="{{ $companyInfo?->address }}">
                                            <x-input-error :messages="$errors->get('address')" class="mt-2" />

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="mb-10 font-sm color-text-mutted">Link bản đồ (Link
                                                iframe)</label>
                                            <input type="text" name="map_link" class="form-control"
                                                value="{{ $companyInfo?->map_link }}">
                                        </div>
                                    </div>

                                </div>
                                <div class="box-button mt-15">
                                    <button class="font-bold btn btn-apply-big font-md">Lưu thay đổi</button>
                                </div>
                            </form>
                        </div>


                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            <form action="{{ route('company.profile.account-info') }}" method="POST"
                                enctype="mulipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group select-style">
                                            <label class="mb-10 font-sm text-capitalize color-text-mutted">Tên doanh nghiệp
                                                *
                                            </label>
                                            <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                type="text" name="name" value="{{ auth()->user()->name }}">
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-10 font-sm text-capitalize color-text-mutted">Email * </label>
                                            <input class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                type="text" name="email" value="{{ auth()->user()->email }}">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mt-2 mb-4 box-button w-50">
                                            <button class="font-bold btn btn-apply-big font-md">Lưu tất cả thay
                                                đổi</button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form action="{{ route('company.profile.password-update') }}" method="POST"
                                enctype="mulipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group icon-side">
                                            <label class="mb-10 font-sm text-capitalize color-text-mutted">Mật khẩu *
                                            </label>
                                            <input
                                                class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                type="password" name="password" id="password_com"
                                                placeholder="*********">
                                            <i class="fa-regular fa-eye" id="togglePasswordCom"></i>

                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group icon-side">
                                            <label class="mb-10 font-sm text-capitalize color-text-mutted">Xác nhận mật
                                                khẩu
                                                * </label>
                                            <input
                                                class="form-control  {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                                type="password" name="password_confirmation" id="password_com_cf"
                                                placeholder="*********">
                                            <i class="fa-regular fa-eye" id="togglePasswordComCf"></i>

                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mt-2 mb-4 box-button w-50">
                                            <button class="font-bold btn btn-apply-big font-md">Lưu tất cả thay
                                                đổi</button>

                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- <ul class="mb-3 nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Company Info</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Founding Info</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Account Settings</button>
                    </li>
                </ul> --}}
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">

                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">

                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- @push('scripts')
    <script>
        $(document).ready(function() {
            $('.country').on('change', function() {
                let country_id = $(this).val();
                // remove all previous cities
                $('.city').html("");

                $.ajax({
                    mehtod: 'GET',
                    url: '{{ route('get-states', ':id') }}'.replace(":id", country_id),
                    data: {},
                    success: function(response) {
                        let html = '';

                        $.each(response, function(index, value) {
                            html +=
                                `<option value="${value.id}" >${value.name}</option>`
                        });

                        $('.state').html(html);
                    },
                    error: function(xhr, status, error) {}
                })
            })

            // get cities
            $('.state').on('change', function() {
                let state_id = $(this).val();

                $.ajax({
                    mehtod: 'GET',
                    url: '{{ route('get-cities', ':id') }}'.replace(":id", state_id),
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
        })
    </script>
@endpush --}}

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.country').on('change', function() {
                let country_id = $(this).val();
                // remove all previous cities
                $('.district').html("");

                $.ajax({
                    mehtod: 'GET',
                    url: '{{ route('get-cities', ':id') }}'.replace(":id", country_id),
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
                    url: '{{ route('get-districts', ':id') }}'.replace(":id", city_id),
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



        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            // Giảm 1 ngày để lấy ngày hôm trước
            dtToday.setDate(dtToday.getDate() - 1);

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var minDate = year + '-' + month + '-' + day;
            $('#inputdate').attr('max', minDate);
        });
    </script>
@endpush
