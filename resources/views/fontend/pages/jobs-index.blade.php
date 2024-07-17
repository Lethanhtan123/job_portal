@extends('fontend.layouts.master')

@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Tuyển dụng</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('home') }}">Trang chủ</a></li>
                            <li>Tin tuyển dụng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="flex-row-reverse row">
                <div class="float-right col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="content-page">

                        <div class="row display-list">
                            @forelse ($jobs as $job)
                                <div class="col-12">
                                    <div class="card-grid-2 hover-up"><span class="flash"></span>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="card-grid-2-image-left">
                                                    <div class="image-box"><img src="{{ asset($job->company->logo) }}"
                                                            alt="joblist"></div>
                                                    <div class="right-info"><a class="name-job"
                                                            href="{{ route('companies.show', $job->company->slug) }}">{{ $job->company->name }}</a>

                                                        <span
                                                            class="location-small">{{ $job->company->companyCountry->name }}</span>

                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                                <div class="pl-15 mb-15 mt-30">
                                                    @if ($job->featured)
                                                        <a class="mr-5 btn btn-grey-small featured" href="javascript:;">Nổi
                                                            bật</a>
                                                    @endif
                                                    @if ($job->highlight)
                                                        <a class="mr-5 btn btn-grey-small highlight" href="javascript:;">Phổ
                                                            biến</a>
                                                    @endif
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="card-block-info">
                                            <h4><a href="{{ route('jobs.show', $job->slug) }}">{{ $job->title }}</a></h4>
                                            <div class="mt-5">
                                                <span class="card-briefcase">{{ $job->jobType->name }}</span>
                                                <span class="card-briefcase">{{ $job->jobExperience?->name }}</span>
                                                <span
                                                    class="card-time"><span>{{ $job->created_at->diffForHumans() }}</span></span>
                                            </div>

                                            <div class="mb-15 mt-30">
                                                @foreach ($job->skills as $jobSkill)
                                                    @if ($loop->index <= 6)
                                                        <a class="mr-5 btn btn-grey-small job-skill"
                                                            href="javascript:;">{{ $jobSkill->skill->name }}</a>
                                                    @elseif ($loop->index == 7)
                                                        <a class="mr-5 btn btn-grey-small job-skill"
                                                            href="javascript:;">More..</a>
                                                    @endif
                                                @endforeach
                                            </div>

                                            <div class="mt-20 card-2-bottom">
                                                <div class="row">
                                                    @if ($job->salary_mode === 'range')
                                                        <div class="col-lg-7 col-7"><span class="card-text-price"> Mức
                                                                lương:
                                                                {{ $job->min_salary }} - {{ $job->max_salary }}
                                                                {{ config('settings.site_default_currency') }}
                                                                {{ $job->tygia }}/VNĐ
                                                            </span><span class="text-muted"></span>
                                                        </div>
                                                    @else
                                                        <div class="col-lg-7 col-7"><span class="card-text-price">
                                                                {{ $job->custom_salary }}
                                                            </span><span class="text-muted"></span>
                                                        </div>
                                                    @endif
                                                    @php
                                                        $bookmarkedIds = \App\Models\JobBookmark::where(
                                                            'candidate_id',
                                                            auth()?->user()?->id,
                                                        )
                                                            ->pluck('job_id')
                                                            ->toArray();

                                                    @endphp

                                                    <div class="col-lg-5 col-5 text-end">
                                                        <div class="border-0 btn bookmark-btn job-bookmark"
                                                            data-id="{{ $job->id }}">

                                                            @if (in_array($job->id, $bookmarkedIds))
                                                                <i  style="" class="fas fa-bookmark active-bookmark "></i>
                                                            @else
                                                                <i class="far fa-bookmark"></i>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h5 class="text-center">Tiếc quá không tìm thấy dữ liệu! 😥</h5>
                            @endforelse

                        </div>
                    </div>

                    <div class="paginations">
                        <ul class="pager">
                            @if ($jobs->hasPages())
                                {{ $jobs->withQueryString()->links() }}
                            @endif
                        </ul>
                    </div>
                </div>


                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="sidebar-shadow none-shadow mb-30 cus_sidebar">
                        <div class="sidebar-filters">
                            <div class="filter-block head-border mb-30">
                                <h5>Tìm kiếm nhanh <a class="link-reset" href="{{ route('jobs.index') }}">Tạo lại</a></h5>
                            </div>

                            <form action="{{ route('jobs.index') }}" method="GET">
                                <div class="mb-20 filter-block">
                                    <div class="form-group ">
                                        <input type="text" value="{{ request()?->search }}" class="form-control"
                                            name="search" placeholder="Nhập từ khóa ...">
                                    </div>
                                </div>
                                <div class="mb-20 filter-block">
                                    <div class="form-group select-style">
                                        <select name="country" class="form-control country form-icons select-active">
                                            <option value="">Quốc gia</option>
                                            @foreach ($countries as $item)
                                                <option @selected(request()?->country == $item->id) value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-20 filter-block">
                                    <div class="form-group select-style">
                                        <select name="city" class="city form-control form-icons select-active">
                                            @if ($selectedCites)
                                                <option value="">All</option>
                                                @foreach ($selectedCites as $item)
                                                    <option @selected($item->id == request()->city) value="{{ $item->id }}">
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            @else
                                                <option value="">Thành phố</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-20 filter-block">
                                    <div class="form-group select-style">
                                        <select name="district" class="district form-control form-icons select-active">
                                            @if ($selectedDistricts)
                                                <option value="">All</option>

                                                @foreach ($selectedDistricts as $item)
                                                    <option @selected($item->id == request()->city) value="{{ $item->id }}">
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            @else
                                                <option value="">Quận/Huyện</option>
                                            @endif
                                        </select>
                                        <button class="mt-10 submit btn btn-default rounded-1 w-100"
                                            type="submit">Search</button>
                                    </div>
                                </div>
                            </form>


                            <form action="{{ route('jobs.index') }}" method="GET">
                                <div class="mb-20 filter-block">
                                    <h5 class="medium-heading mb-15">Loại ngành</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox overflow">
                                            @foreach ($jobCategories as $category)
                                                <li>
                                                    <label class="cb-container">
                                                        <input type="checkbox" name="category[]"
                                                            value="{{ $category->slug }}"><span
                                                            class="text-small">{{ $category->name }}</span><span
                                                            class="checkmark"></span>
                                                    </label><span class="number-item">{{ $category->jobs_count }}</span>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                                <div class="mb-20 filter-block">
                                    <h5 class="medium-heading mb-25">Khoảng lương</h5>
                                    <div class="pb-20 list-checkbox">
                                        <div class="mt-10 mb-20 row position-relative">
                                            <div class="col-sm-12 box-slider-range">
                                                <div id="slider-range"></div>
                                            </div>
                                            <div class="box-input-money">
                                                <input class="input-disabled form-control min-value-money" type="text"
                                                    name="min-value-money" disabled="disabled" value="">
                                                <input class="form-control min-value" type="hidden" name="min_salary"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="box-number-money">
                                            <div class="row mt-30">
                                                <div class="col-sm-6 col-6"><span class="font-sm color-brand-1">0
                                                        Triệu VNĐ</span>
                                                </div>
                                                <div class="col-sm-6 col-6 text-end"><span

                                                        class="font-sm color-brand-1">500 Triệu VNĐ</span></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="mb-20 filter-block">
                                    <h5 class="medium-heading mb-15">Loại công việc</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox overflow">
                                            @foreach ($JobType as $item)
                                                <li>
                                                    <label class="cb-container">
                                                        <input type="checkbox" name="jobtype[]"
                                                            value="{{ $item->slug }}"><span
                                                            class="text-small">{{ $item->name }}</span><span
                                                            class="checkmark"></span>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <button class="mt-10 submit btn btn-default rounded-1 w-100"
                                    type="submit">Tìm kiếm</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.country').on('change', function() {
                let country_id = $(this).val();

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

                        html = `<option value="" >Choose</option>` + html;

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
                    url: '{{ route('get-districts', ':id') }}'.replace(":id", city_id),
                    data: {},
                    success: function(response) {
                        let html = '';

                        $.each(response, function(index, value) {
                            html +=
                                `<option value="${value.id}" >${value.name}</option>`
                        });

                        html = `<option value="" >Choose</option>` + html;

                        $('.district').html(html);

                    },
                    error: function(xhr, status, error) {

                    }
                })
            })
        });


        $(document).ready(function() {
            $('.min_salary, .max_salary').on('input', function() {
                var min_salary = parseFloat($('.min_salary').val()) || 0;
                var max_salary = parseFloat($('.max_salary').val()) || 0;

                if (max_salary < min_salary) {
                    $('.max_salary').val(min_salary);
                }
            });
        });



    </script>
@endpush
