@extends('fontend.layouts.master')

@section('contents')
<section class="section-box mt-75">
    <div class="breacrumb-cover">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <h2 class="mb-20">Orders</h2>
                    <ul class="breadcrumbs">
                        <li><a class="home-icon" href="index.html">Home</a></li>
                        <li>Orders</li>
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
                    <form action="{{ route('company.jobs.update',$job->id) }}" method="POST">
                        @csrf

                        @method('PUT')
                        <div class="mb-3 card">
                            <div class="card-header">
                                Job Details
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control {{ hasError($errors, 'title') }}"
                                                name="title" value="{{ old('title',$job->title) }}">
                                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group select-style">
                                            <label for="">Category <span class="text-danger">*</span></label>
                                            <select name="category" id=""
                                                class="form-control form-icons select-active {{ hasError($errors, 'category') }}">
                                                <option value="">Choose</option>
                                                @foreach ($categories as $category)
                                                <option @selected($category->id === $job->job_category_id) value="{{ $category->id }}">{{ $category->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Total Vacancies <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control {{ hasError($errors, 'vacancies') }}"
                                                name="vacancies" value="{{ old('vacancies',$job->vacancies) }}">
                                            <x-input-error :messages="$errors->get('vacancies')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Deadline <span class="text-danger">*</span></label>
                                            <input type="date" id="inputdate"
                                                class="inputdate form-control  {{ hasError($errors, 'deadline') }}"
                                                name="deadline" value="{{ old('deadline',$job->deadline) }}">
                                            <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 card">
                            <div class="card-header">
                                Location
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label for="">Country </label>
                                            <select name="country" id=""
                                                class="form-control form-icons select-active country {{ hasError($errors, 'country') }}">
                                                <option value="">Choose</option>
                                                @foreach ($countries as $country)
                                                <option @selected($country->id === $job->country_id) value="{{ $country->id }}">{{ $country->name }}</option>

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
                                            <label for="">City </label>
                                            <select name="city" id=""
                                                class="form-control form-icons select-active city {{ hasError($errors, 'city') }}">
                                                <option value="">Choose</option>
                                                @foreach ($cities as $item)
                                                <option @selected($item->id === $job->city_id) value="{{ $item->id }}">{{ $item->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label for="">District </label>
                                            <select name="district" id=""
                                                class="form-control form-icons select-active district {{ hasError($errors, 'district') }}">
                                                <option value="">Choose</option>
                                                @foreach ($districts as $item)
                                                <option @selected($item->id === $job->district_id) value="{{ $item->id }}">{{ $item->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('district')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <input type="text" class="form-control {{ hasError($errors, 'address') }}"
                                                name="address" value="{{ old('address',$job->address) }}">
                                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="mb-3 card">
                            <div class="card-header">
                                Salary Details
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group d-flex">
                                                    <input style="height: 18px;width: 18px;" @checked($job->salary_mode === 'range')
                                                        onclick="salaryModeChange('salary_range')" type="radio"
                                                        id="salary_range"
                                                        class="from-control {{ hasError($errors, 'salary_mode') }}"
                                                        name="salary_mode" checked value="range">
                                                    <label style="margin-left: 5px;
                                                    margin-top: -4px;" for="salary_range">Salary Range </label>
                                                    <x-input-error :messages="$errors->get('salary_mode')"
                                                        class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group d-flex">
                                                    <input style="height: 18px;width: 18px;" @checked($job->salary_mode === 'custom')
                                                        onclick="salaryModeChange('custom_salary')" type="radio"
                                                        id="custom_salary"
                                                        class="from-control {{ hasError($errors, 'salary_mode') }}"
                                                        name="salary_mode" value="custom">
                                                    <label style="margin-left: 5px;
                                                    margin-top: -4px;" for="custom_salary">Custom Salary </label>
                                                    <x-input-error :messages="$errors->get('salary_mode')"
                                                        class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Tỷ giá <span class="text-danger">*</span> </label>
                                                    <select name="tygia" id=""
                                                        class="form-control select2 {{ hasError($errors, 'tygia') }}">
                                                        <option value="">Choose</option>
                                                        <option @selected($job->tygia === 'Triệu') value="Triệu">Triệu</option>
                                                        <option @selected($job->tygia === 'Nghìn') value="Nghìn">Nghìn</option>
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
                                                    <label for="">Maximum Salary <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control max_salary {{ hasError($errors, 'max_salary') }}"
                                                        name="max_salary" value="{{ old('max_salary',$job->max_salary) }}">
                                                    <x-input-error :messages="$errors->get('max_salary')"
                                                        class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Minimum Salary <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control min_salary {{ hasError($errors, 'min_salary') }}"
                                                        name="min_salary" value="{{ old('min_salary',$job->min_salary) }}">
                                                    <x-input-error :messages="$errors->get('min_salary')"
                                                        class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 custom_salary_part d-none">
                                        <div class="form-group">
                                            <label for="">Custom Salary <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control {{ hasError($errors, 'custom_salary') }}"
                                                name="custom_salary" value="{{ old('custom_salary',$job->custom_salary) }}">
                                            <x-input-error :messages="$errors->get('custom_salary')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group select-style">
                                            <label for="">Salary Type <span class="text-danger">*</span> </label>
                                            <select name="salary_type" id=""
                                                class="form-control form-icons select-active {{ hasError($errors, 'salary_type') }}">
                                                <option value="">Choose</option>
                                                @foreach  ($salaryTypes as $salaryType)
                                                <option  @selected($salaryType->id === $job->salary_type_id) value="{{ $salaryType->id }}">{{ $salaryType->name }}</option>

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
                                Attributes
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group select-style">
                                            <label for="">Experience <span class="text-danger ">*</span></label>
                                            <select name="experience" id=""
                                                class="form-control form-icons select-active {{ hasError($errors, 'experience') }}">
                                                <option value="">Choose</option>
                                                @foreach ($experiences as $experience)
                                                <option @selected($experience->id === $job->job_experience_id) value="{{ $experience->id }}">{{ $experience->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('experience')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group select-style">
                                            <label for="">Job Role <span class="text-danger ">*</span></label>
                                            <select name="job_role" id=""
                                                class="form-control form-icons select-active {{ hasError($errors, 'job_role') }}">
                                                <option value="">Choose</option>
                                                @foreach ($jobRoles as $role)
                                                <option @selected($role->id === $job->job_role_id) value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('job_role')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group select-style">
                                            <label for="">Education <span class="text-danger ">*</span></label>
                                            <select name="education" id=""
                                                class="form-control form-icons select-active {{ hasError($errors, 'education') }}">
                                                <option value="">Choose</option>
                                                @foreach  ($educations as $education)
                                                <option @selected($education->id === $job->education_id) value="{{ $education->id }}">{{ $education->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('education')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group select-style">
                                            <label for="">Job Type <span class="text-danger ">*</span></label>
                                            <select name="job_type" id=""
                                                class="form-control form-icons select-active {{ hasError($errors, 'job_type') }}">
                                                <option value="">Choose</option>
                                                @foreach  ($jobTypes as $jobType)
                                                <option @selected($jobType->id === $job->job_type_id) value="{{ $jobType->id }}">{{ $jobType->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('job_type')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group select-style">
                                            <label for="">Tags <span class="text-danger ">*</span></label>
                                            <select name="tags[]" id="" multiple
                                                class="form-control form-icons select-active {{ hasError($errors, 'tags') }}">
                                                <option value="">Choose</option>

                                                @php
                                                    $selectedTags =  $job->tags()->pluck('tag_id')->toArray();
                                                @endphp

                                                @foreach ($tags as $item)
                                                <option @selected(in_array($item->id, $selectedTags)) value="{{ $item->id }}">{{ $item->name }}</option>
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
                                            <label for="">Skills <span class="text-danger ">*</span></label>
                                            <select name="skills[]" id="" multiple
                                                class="form-control form-icons select-active {{ hasError($errors, 'skills') }}">
                                                <option value="">Choose</option>

                                                @php
                                                $selectedSkills =  $job->skills()->pluck('skill_id')->toArray();
                                                @endphp

                                                @foreach ($skills as $item)
                                                <option @selected(in_array($item->id, $selectedSkills)) value="{{ $item->id }}">{{ $item->name }}</option>
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
                                Application Options
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group select-style">
                                            <label for="">Receive Applications <span class="text-danger">*</span>
                                            </label>
                                            <select name="receive_applications" id=""
                                                class="form-control form-icons select-active {{ hasError($errors, 'receive_applications') }}">
                                                <option @selected($job->apply_on == 'app') value="app">On Our Platform</option>
                                                <option @selected($job->apply_on == 'email') value="email">On your email address</option>
                                                <option @selected($job->apply_on == 'custom_url') value="custom_url">On a custom link</option>
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
                                Promote
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group d-flex">
                                                    <input @checked($job->featured) style="height: 18px;width: 18px;" type="checkbox"
                                                        id="featured"
                                                        class="from-control {{ hasError($errors, 'featured') }}"
                                                        name="featured" value="1">
                                                    <label style="margin-left: 5px;
                                                    margin-top: -4px;" for="featured">Featured </label>
                                                    <x-input-error :messages="$errors->get('featured')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group d-flex">
                                                    <input @checked($job->highlight) style="height: 18px;width: 18px;" type="checkbox"
                                                        id="highlight"
                                                        class="from-control {{ hasError($errors, 'highlight') }}"
                                                        name="highlight" value="1">
                                                    <label style="margin-left: 5px;
                                                    margin-top: -4px;" for="highlight">Highlight </label>
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
                                Description
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Description <span class="text-danger">*</span> </label>
                                            <textarea id="editor" name="description">{!! $job->description !!}</textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
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
                url: '{{ route("admin.get-cities", ":id") }}'.replace(":id", country_id),
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
                url: '{{ route("admin.get-districts", ":id") }}'.replace(":id", city_id),
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
