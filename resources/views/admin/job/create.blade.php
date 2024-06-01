@extends('admin.layouts.master')
@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Jop post</h1>
    </div>
    <div class="section-body">
        @foreach ($errors->all() as $error)
        <div class="text-danger">{{ $error }}</div>
        @endforeach
        <div class="col-12">
            <div class="card">

                <div class=" card-body">
                    <form action="{{ route('admin.jobs.store') }}" method="POST">
                        @csrf

                        <div class="card">
                            <div class="card-header">
                                Job Details
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control {{ hasError($errors, 'title') }}"
                                                name="title" value="{{ old('title') }}">
                                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Select Company <span class="text-danger ">*</span></label>
                                            <select name="company" id=""
                                                class="form-control select2 {{ hasError($errors, 'company') }}">
                                                <option value="">Choose</option>
                                                @foreach ($companies as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('company')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Category <span class="text-danger">*</span></label>
                                            <select name="category" id=""
                                                class="form-control select2 {{ hasError($errors, 'category') }}">
                                                <option value="">Choose</option>
                                                @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Total Vacancies <span class="text-danger">*</span></label>
                                            <input min="0"
                                                onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                                type="number" class="form-control {{ hasError($errors, 'vacancies') }}"
                                                name="vacancies" value="{{ old('vacancies') }}">
                                            <x-input-error :messages="$errors->get('vacancies')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Deadline <span class="text-danger">*</span></label>
                                            <input type="date" id="inputdate" data-date-end-date="0d"
                                                class="form-control  {{ hasError($errors, 'deadline') }}"
                                                name="deadline" value="{{ old('deadline') }}">
                                            <x-input-error :messages="$errors->get('deadline')" class="mt-2" />


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Location
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Country </label>
                                            <select name="country" id=""
                                                class="form-control select2 country {{ hasError($errors, 'country') }}">
                                                <option value="">Choose</option>
                                                @foreach ($countries as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">State </label>
                                            <select name="state" id=""
                                                class="form-control select2 state {{ hasError($errors, 'state') }}">
                                                <option value="">Choose</option>
                                                @foreach ($states as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                        </div>
                                    </div> --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">City </label>
                                            <select name="city" id=""
                                                class="form-control select2 city {{ hasError($errors, 'city') }}">
                                                <option value="">Choose</option>
                                                @foreach ($cities as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">District </label>
                                            <select name="district" id=""
                                                class="form-control select2 district {{ hasError($errors, 'district') }}">
                                                <option value="">Choose</option>
                                                @foreach ($district as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('district')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <input type="text" class="form-control {{ hasError($errors, 'address') }}"
                                                name="address" value="{{ old('address') }}">
                                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Salary Details
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <input onclick="salaryModeChange('salary_range')" type="radio"
                                                        id="salary_range"
                                                        class="from-control {{ hasError($errors, 'salary_mode') }}"
                                                        name="salary_mode" checked value="range">
                                                    <label for="salary_range">Salary Range </label>
                                                    <x-input-error :messages="$errors->get('salary_mode')"
                                                        class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <input onclick="salaryModeChange('custom_salary')" type="radio"
                                                        id="custom_salary"
                                                        class="from-control {{ hasError($errors, 'salary_mode') }}"
                                                        name="salary_mode" value="custom">
                                                    <label for="custom_salary">Custom Salary </label>
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
                                                    <label for="">Maximum Salary <span class="text-danger">*</span></label>
                                                    <input min="0"
                                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                                        type="number" class="max_salary form-control {{ hasError($errors, 'max_salary') }}"
                                                        name="max_salary" value="{{ old('max_salary') }}">
                                                    <x-input-error :messages="$errors->get('max_salary')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Minimum Salary <span class="text-danger">*</span></label>
                                                    <input min="0"
                                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                                        type="number" class="min_salary form-control {{ hasError($errors, 'min_salary') }}"
                                                        name="min_salary" value="{{ old('min_salary') }}">
                                                    <x-input-error :messages="$errors->get('min_salary')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 custom_salary_part d-none">
                                        <div class="form-group">
                                            <label for="">Custom Salary <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control {{ hasError($errors, 'custom_salary') }}"
                                                name="custom_salary" value="{{ old('custom_salary') }}">
                                            <x-input-error :messages="$errors->get('custom_salary')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Salary Type <span class="text-danger">*</span> </label>
                                            <select name="salary_type" id=""
                                                class="form-control select2 {{ hasError($errors, 'salary_type') }}">
                                                <option value="">Choose</option>
                                                @foreach ($salaryTypes as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('salary_type')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Job Type <span class="text-danger ">*</span></label>
                                            <select name="job_type" id=""
                                                class="form-control select2 {{ hasError($errors, 'job_type') }}">
                                                <option value="">Choose</option>
                                                @foreach ($jobTypes as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('job_type')" class="mt-2" />
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Attributes
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Experience <span class="text-danger ">*</span></label>
                                            <select name="experience" id=""
                                                class="form-control select2 {{ hasError($errors, 'experience') }}">
                                                <option value="">Choose</option>
                                                @foreach ($experiences as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('experience')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Job Role <span class="text-danger ">*</span></label>
                                            <select name="job_role" id=""
                                                class="form-control select2 {{ hasError($errors, 'job_role') }}">
                                                <option value="">Choose</option>
                                                @foreach ($jobRoles as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('job_role')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Education <span class="text-danger ">*</span></label>
                                            <select name="education" id=""
                                                class="form-control select2 {{ hasError($errors, 'education') }}">
                                                <option value="">Choose</option>
                                                @foreach ($educations as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('education')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Tags <span class="text-danger ">*</span></label>
                                            <select name="tags[]" id="" multiple
                                                class="form-control select2 {{ hasError($errors, 'tags') }}">
                                                <option value="">Choose</option>
                                                @foreach ($tags as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach

                                            </select>
                                            <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Benefits <span class="text-danger ">*</span></label>
                                            <input type="text"
                                                class="form-control inputtags {{ hasError($errors, 'benefits') }}"
                                                name="benefits" value="{{ old('benefits') }}">
                                            <x-input-error :messages="$errors->get('benefits')" class="mt-2" />
                                        </div>
                                    </div> --}}

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Skills <span class="text-danger ">*</span></label>
                                            <select name="skills[]" id="" multiple
                                                class="form-control select2 {{ hasError($errors, 'skills') }}">
                                                <option value="">Choose</option>
                                                @foreach ($skills as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('skills')" class="mt-2" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Recive Applications
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Receive Applications <span class="text-danger">*</span>
                                            </label>
                                            <select name="receive_applications" id=""
                                                class="form-control select2 {{ hasError($errors, 'receive_applications') }}">
                                                <option value="app">On Our Platform</option>
                                                <option value="email">On your email address</option>
                                                <option value="custom_url">On a custom link</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('receive_applications')"
                                                class="mt-2" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Promote
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <input type="checkbox" id="featured"
                                                        class="from-control {{ hasError($errors, 'featured') }}"
                                                        name="featured" checked value="1">
                                                    <label for="featured">Featured </label>
                                                    <x-input-error :messages="$errors->get('featured')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <input type="checkbox" id="highlight"
                                                        class="from-control {{ hasError($errors, 'highlight') }}"
                                                        name="highlight" value="1">
                                                    <label for="highlight">Highlight </label>
                                                    <x-input-error :messages="$errors->get('highlight')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Description
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Description <span class="text-danger">*</span> </label>
                                            <textarea id="editor" name="description"></textarea>
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
    // $(".inputtags").tagsinput('items');

    function salaryModeChange(mode) {
        if(mode == 'salary_range') {
            $('.salary_range_part').removeClass('d-none')
            $('.custom_salary_part').addClass('d-none')
        }else if (mode == 'custom_salary') {
            $('.salary_range_part').addClass('d-none')
            $('.custom_salary_part').removeClass('d-none')
        }
    }

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
