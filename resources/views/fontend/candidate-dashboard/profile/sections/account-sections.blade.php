<div class="tab-pane fade show" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
    <form action=" {{ route('candidate.profile.basic-info.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-3">Địa chỉ</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group select-style">
                            <label class="mb-10 font-sm text-capitalize color-text-mutted">Quốc gia *</label>
                            <select name="country" id=""
                                class="{{ hasError($errors, 'country') }} country form-control form-icons select-active">
                                <option value=""> Chọn quốc gia </option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"> {{ $country->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group select-style">
                            <label class="mb-10 font-sm text-capitalize color-text-mutted">Tỉnh/Thành phố</label>
                            <select name="city" id="city"
                                class="{{ hasError($errors, 'city') }} city form-control form-icons select-active">
                                <option value=""> Chọn tỉnh/thành phố </option>

                            </select>
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group select-style">
                            <label class="mb-10 font-sm text-capitalize color-text-mutted">Quận/Huyện</label>
                            <select name="district" id=""
                                class="{{ hasError($errors, 'district') }} district form-control form-icons select-active">
                                <option value=""> Chọn quận/huyện </option>

                            </select>
                            <x-input-error :messages="$errors->get('district')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="mb-10 font-sm text-capitalize color-text-mutted">Địa chỉ
                            </label>
                            <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }} "
                                type="text" value="" name="address">
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
                            <label class="mb-10 font-sm text-capitalize color-text-mutted">Số điện thoại 1
                            </label>
                            <input class="form-control {{ $errors->has('phone_one') ? 'is-invalid' : '' }} "
                                type="text" value="" name="phone_one">
                            <x-input-error :messages="$errors->get('phone_one')" class="mt-2" />
                        </div>

                    </div>
                     <div class="col-md-4">
                        <div class="form-group">
                            <label class="mb-10 font-sm text-capitalize color-text-mutted">Số điện thoại 2
                            </label>
                            <input class="form-control {{ $errors->has('phone_two') ? 'is-invalid' : '' }} "
                                type="text" value="" name="phone_two">
                            <x-input-error :messages="$errors->get('phone_two')" class="mt-2" />
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="form-group">
                            <label class="mb-10 font-sm text-capitalize color-text-mutted">Email
                            </label>
                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} "
                                type="email" value="" name="email">
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
        })
    </script>
@endpush
