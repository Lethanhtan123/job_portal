@extends('fontend.layouts.master')

@section('contents')
<section class="section-box mt-75">
    <div class="breacrumb-cover">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <h2 class="mb-20">Trang cá nhân</h2>
                    <ul class="breadcrumbs">
                        <li><a class="home-icon" href="{{ route('home') }}">Trang chủ</a></li>
                        <li>Tin tuyển dụng</li>
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
                <div class="card-body">
                    <form action="{{ route('company.jobs.store') }}" method="POST">
                        @csrf

                        <div class="mb-3 card">
                            <div class="card-header">
                                Chi tiết tin tyển dụng
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Tiêu đề <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control {{ hasError($errors, 'title') }}"
                                                name="title" value="{{ old('title') }}">
                                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group select-style">
                                            <label for="">Loại ngành <span class="text-danger">*</span></label>
                                            <select name="category" id=""
                                                class="form-control form-icons select-active {{ hasError($errors, 'category') }}">
                                                <option value="">Choose</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Số lượng cần tuyển <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control {{ hasError($errors, 'vacancies') }}"
                                                name="vacancies" min="1" value="{{ old('vacancies') }}">
                                            <x-input-error :messages="$errors->get('vacancies')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Hạn cuối đăng ký <span class="text-danger">*</span></label>
                                            <input type="date" id="inputdate"
                                                class="inputdate form-control  {{ hasError($errors, 'deadline') }}"
                                                name="deadline" value="{{ old('deadline') }}">
                                            <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 card">
                            <div class="card-header">
                                Vị trí, địa điểm
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label for="">Quốc gia </label>
                                            <select name="country" id=""
                                                class="form-control form-icons select-active country {{ hasError($errors, 'country') }}">
                                                <option value="">Choose</option>
                                                @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label for="">State </label>
                                            <select name="state" id=""
                                                class="form-control form-icons select-active state {{ hasError($errors, 'state') }}">
                                                <option value="">Choose</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                        </div>
                                    </div> --}}
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label for="">Tỉnh/Thành phố</label>
                                            <select name="city" id=""
                                                class="form-control form-icons select-active city {{ hasError($errors, 'city') }}">
                                                <option value="">Choose</option>
                                                @foreach ($cities as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label for="">Quận/huyện </label>
                                            <select name="district" id=""
                                                class="form-control form-icons select-active district {{ hasError($errors, 'district') }}">
                                                <option value="">Choose</option>
                                                @foreach ($districts as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('district')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Địa chỉ</label>
                                            <input type="text" class="form-control {{ hasError($errors, 'address') }}"
                                                name="address" value="{{ old('address') }}">
                                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="mb-3 card">
                            <div class="card-header">
                                Chi tiết lương
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group d-flex">
                                                    <input style="height: 18px;width: 18px;"
                                                        onclick="salaryModeChange('salary_range')" type="radio"
                                                        id="salary_range"
                                                        class="from-control {{ hasError($errors, 'salary_mode') }}"
                                                        name="salary_mode" checked value="range">
                                                    <label style="margin-left: 5px;
                                                    margin-top: -4px;" for="salary_range">Lương cố định(khoảng) </label>
                                                    <x-input-error :messages="$errors->get('salary_mode')"
                                                        class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group d-flex">
                                                    <input style="height: 18px;width: 18px;"
                                                        onclick="salaryModeChange('custom_salary')" type="radio"
                                                        id="custom_salary"
                                                        class="from-control {{ hasError($errors, 'salary_mode') }}"
                                                        name="salary_mode" value="custom">
                                                    <label style="margin-left: 5px;
                                                    margin-top: -4px;" for="custom_salary">Lương thỏa thuận </label>
                                                    <x-input-error :messages="$errors->get('salary_mode')"
                                                        class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Đơn vị <span class="text-danger"></span> </label>
                                                    <select name="tygia" id=""
                                                        class="form-control select2 {{ hasError($errors, 'tygia') }}">
                                                        <option value="">Choose</option>
                                                        <option value="Triệu">Triệu</option>
                                                        <option value="Nghìn">Nghìn</option>
                                                    </select>
                                                    <x-input-error :messages="$errors->get('tygia')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 salary_range_part">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Lương tối đa <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control max_salary {{ hasError($errors, 'max_salary') }}"
                                                        name="max_salary" value="{{ old('max_salary') }}">
                                                    <x-input-error :messages="$errors->get('max_salary')"
                                                        class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Lương tối thiểu <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control min_salary {{ hasError($errors, 'min_salary') }}"
                                                        name="min_salary" value="{{ old('min_salary') }}">
                                                    <x-input-error :messages="$errors->get('min_salary')"
                                                        class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 custom_salary_part d-none">
                                        <div class="form-group">
                                            <label for="">Lương thỏa thuận <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control {{ hasError($errors, 'custom_salary') }}"
                                                name="custom_salary" value="{{ old('custom_salary') }}">
                                            <x-input-error :messages="$errors->get('custom_salary')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group select-style">
                                            <label for="">Loại trả lương <span class="text-danger">*</span> </label>
                                            <select name="salary_type" id=""
                                                class="form-control form-icons select-active {{ hasError($errors, 'salary_type') }}">
                                                <option value="">Choose</option>
                                                @foreach ($salaryTypes as $salaryType)
                                                <option value="{{ $salaryType->id }}">{{ $salaryType->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('salary_type')" class="mt-2" />
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="mb-3 card">
                            <div class="card-header">
                                Tùy chọn khác
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group select-style">
                                            <label for="">Kinh nghiệm <span class="text-danger ">*</span></label>
                                            <select required name="experience" id=""
                                                class="form-control form-icons select-active {{ hasError($errors, 'experience') }}">
                                                <option value="">Choose</option>
                                                @foreach ($experiences as $experience)
                                                <option value="{{ $experience->id }}">{{ $experience->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('experience')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group select-style">
                                            <label for="">Chức vụ <span class="text-danger ">*</span></label>
                                            <select required name="job_role" id=""
                                                class="form-control form-icons select-active {{ hasError($errors, 'job_role') }}">
                                                <option value="">Choose</option>
                                                @foreach ($jobRoles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('job_role')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group select-style">
                                            <label for="">Trình độ học vấn</label> <span class="text-danger ">*</span></label>
                                            <select required name="education" id=""
                                                class="form-control form-icons select-active {{ hasError($errors, 'education') }}">
                                                <option value="">Choose</option>
                                                @foreach ($educations as $education)
                                                <option value="{{ $education->id }}">{{ $education->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('education')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group select-style">
                                            <label for="">Loại công việc <span class="text-danger ">*</span></label>
                                            <select required name="job_type" id=""
                                                class="form-control form-icons select-active {{ hasError($errors, 'job_type') }}">
                                                <option value="">Choose</option>
                                                @foreach ($jobTypes as $jobType)
                                                <option value="{{ $jobType->id }}">{{ $jobType->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('job_type')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group select-style">
                                            <label for="">Tags <span class="text-danger ">*</span></label>
                                            <select required name="tags[]" id="" multiple
                                                class="form-control form-icons select-active {{ hasError($errors, 'tags') }}">
                                                <option value="">Choose</option>
                                                @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach

                                            </select>
                                            <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <div class="form-group ">
                                            <label for="">Benefits <span class="text-danger ">*</span></label>
                                            <input type="text"
                                                class="form-control inputtags {{ hasError($errors, 'benefits') }}"
                                                name="benefits" value="{{ old('benefits') }}">
                                            <x-input-error :messages="$errors->get('benefits')" class="mt-2" />
                                        </div>
                                    </div> --}}

                                    <div class="col-md-12">
                                        <div class="form-group select-style">
                                            <label for="">Kỹ năng <span class="text-danger ">*</span></label>
                                            <select required name="skills[]" id="" multiple
                                                class="form-control form-icons select-active {{ hasError($errors, 'skills') }}">
                                                <option value="">Choose</option>
                                                @foreach ($skills as $skill)
                                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('skills')" class="mt-2" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="mb-3 card">
                            <div class="card-header">
                                Theo dõi thông tin
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group select-style">
                                            <label for="">Nhận ứng tuyển tại <span class="text-danger">*</span>
                                            </label>
                                            <select name="receive_applications" id=""
                                                class="form-control form-icons select-active {{ hasError($errors, 'receive_applications') }}">
                                                {{-- <option value="app">On Our Platform</option> --}}
                                                <option value="email">Liên hệ qua email</option>
                                                <option value="custom_url">Liên hệ qua link</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('receive_applications')"
                                                class="mt-2" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="mb-3 card">
                            <div class="card-header">
                                Hiển thị
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group d-flex">
                                                    <input style="height: 18px;width: 18px;" type="checkbox"
                                                        id="featured"
                                                        class="from-control {{ hasError($errors, 'featured') }}"
                                                        name="featured" value="1">
                                                    <label style="margin-left: 5px;
                                                    margin-top: -4px;" for="featured">Nổi bật </label>
                                                    <x-input-error :messages="$errors->get('featured')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group d-flex">
                                                    <input style="height: 18px;width: 18px;" type="checkbox"
                                                        id="highlight"
                                                        class="from-control {{ hasError($errors, 'highlight') }}"
                                                        name="highlight" value="1">
                                                    <label style="margin-left: 5px;
                                                    margin-top: -4px;" for="highlight">Phổ biến </label>
                                                    <x-input-error :messages="$errors->get('highlight')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="mb-3 card">
                            <div class="card-header">
                                Mô tả
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for=""> Mô tả công việc <span class="text-danger">*</span> </label>
                                            <textarea id="editor" name="description"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="font-bold btn btn-apply font-md">Tạo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
     $(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    // alert(maxDate);
    $('#inputdate').attr('min', maxDate);
});

    function salaryModeChange(mode) {
        if(mode == 'salary_range') {
            $('.salary_range_part').removeClass('d-none')
            $('.custom_salary_part').addClass('d-none')
        }else if (mode == 'custom_salary') {
            $('.salary_range_part').addClass('d-none')
            $('.custom_salary_part').removeClass('d-none')
        }
    };

    $(document).ready(function() {

        $('.country').on('change', function() {

            let country_id = $(this).val();

            $.ajax({
                mehtod: 'GET',
                url: '{{ route("get-cities", ":id") }}'.replace(":id", country_id),
                data: {},
                success: function(response) {
                    let html = '';

                    $.each(response, function(index, value) {
                        html += `<option value="${value.id}" >${value.name}</option>`
                    });

                    $('.city').html(html);

                },
                error: function(xhr, status, error) {

                }
            })
        })
    });

    $(document).ready(function() {

        $('.city').on('change', function() {

            let city_id = $(this).val();

            $.ajax({
                mehtod: 'GET',
                url: '{{ route("get-districts", ":id") }}'.replace(":id", city_id),
                data: {},
                success: function(response) {
                    let html = '';

                    $.each(response, function(index, value) {
                        html += `<option value="${value.id}" >${value.name}</option>`
                    });

                    $('.district').html(html);

                },
                error: function(xhr, status, error) {

                }
            })
        })
    });

    $(document).ready(function() {
    $('.min_salary, .max_salary').on('input', function () {
        var min_salary = parseFloat($('.min_salary').val()) || 0;
        var max_salary = parseFloat($('.max_salary').val()) || 0;

        if (max_salary < min_salary) {
            $('.max_salary').val(min_salary);
        }
    });
});


</script>
@endpush
