@extends('fontend.layouts.master')

@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Tin tuyển dụng</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Chi tiết tin tuyển dụng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box-2">
        <div class="container">
            <div class="mt-30"></div>
            <div class="banner-hero banner-image-single"><img style="height: 300px;object-fit: cover;"
                    src="{{ asset($job->company->banner) }}" alt="joblist">
            </div>
            <div class="mt-30"></div>
            <div class="mt-10 row">
                <div class="col-lg-8 col-md-12">
                    <h3>{{ $job->title }}</h3>
                    <div class="mt-0 mb-15">
                        <span class="card-briefcase">{{ $job->jobType->name }}</span>
                        <span class="mt-10 card-briefcase">{{ $job->jobExperience?->name }}</span>
                        <span class="card-time"><span>{{ $job->created_at->diffForHumans() }}</span></span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 text-lg-end">
                    @if ($alreadyApplied)
                        <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up apply-now"
                            style="background-color:#8d8c8c">Đã ứng tuyển</div>
                    @else
                        <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up apply-now">Ứng tuyển ngay </div>
                    @endif
                </div>
            </div>
            <div class="pt-10 pb-10 border-bottom"></div>
        </div>
    </section>

    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="job-overview">
                        <h5 class="border-bottom pb-15 mb-30">Thông tin tuyển dụng</h5>
                        <div class="row">
                            <div class="col-md-6 d-flex">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('fontend/assets/imgs/page/job-single/industry.svg') }}"
                                        alt="joblist">
                                </div>
                                <div class="ml-10 sidebar-text-info"><span
                                        class="mb-10 text-description industry-icon min_w">Chuyên ngành: </span><strong
                                        class="small-heading">
                                        {{ $job->category->name }}</strong></div>
                            </div>
                            <div class="col-md-6 d-flex mt-sm-15">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('fontend/assets/imgs/page/job-single/job-level.svg') }}"
                                        alt="joblist">
                                </div>
                                <div class="ml-10 sidebar-text-info"><span class="mb-10 text-description min_w joblevel-icon">Chức
                                        vụ: </span><strong class="small-heading">{{ $job->jobRole->name }}</strong></div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 d-flex mb-3">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('fontend/assets/imgs/page/job-single/salary.svg') }}" alt="joblist">
                                </div>
                                <div class="ml-10 sidebar-text-info"><span
                                        class="mb-10 text-description salary-icon min_w text-description">Mức lương: </span><strong
                                        class="small-heading">
                                        @if ($job->salary_mode === 'range')
                                            {{ $job->min_salary }} - {{ $job->max_salary }}/{{ $job->tygia }}VNĐ
                                            {{ config('settings.site_default_currency') }}
                                        @else
                                            {{ $job->custom_salary }}
                                        @endif
                                    </strong></div>
                            </div>
                            <div class="col-md-6 d-flex mb-3">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('fontend/assets/imgs/page/job-single/experience.svg') }}"
                                        alt="joblist">
                                </div>
                                <div class="ml-10 sidebar-text-info"><span
                                        class="mb-10 text-description experience-icon min_w">Kinh nghiệm:</span><strong
                                        class="small-heading">{{ $job->jobExperience?->name }}</strong></div>
                            </div>

                            <div class="col-md-6 d-flex ">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('fontend/assets/imgs/page/job-single/updated.svg') }}"
                                        alt="joblist">
                                </div>
                                <div class="ml-10 sidebar-text-info"><span
                                        class="mb-10 text-description experience-icon min_w">Ngày đăng: </span><strong
                                        class="small-heading">{{ formatDate($job->created_at) }}</strong></div>
                            </div>

                            <div class="col-md-6 d-flex ">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('fontend/assets/imgs/page/job-single/job-level.svg') }}"
                                        alt="joblist">
                                </div>
                                <div class="ml-10 sidebar-text-info"><span class="mb-10 w-sl-mem text-description min_w joblevel-icon">Số
                                        lượng cần tuyển: </span><strong
                                        class="small-heading w-sl-mem">{{ $job->vacancies }}</strong></div>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 d-flex mt-sm-15">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('fontend/assets/imgs/page/job-single/job-type.svg') }}"
                                        alt="joblist">
                                </div>
                                <div class="ml-10 sidebar-text-info"><span class="mb-10 text-description min_w jobtype-icon">Loại
                                        công việc: </span><strong class="small-heading">{{ $job->jobType->name }}</strong>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex mt-sm-15">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('fontend/assets/imgs/page/job-single/deadline.svg') }}"
                                        alt="joblist">
                                </div>
                                <div class="ml-10 sidebar-text-info"><span class="mb-10 text-description min_w">Hạn cuối nộp hồ
                                        sơ: </span><strong class="small-heading">{{ formatDate($job->deadline) }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 d-flex mt-sm-15">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('fontend/assets/imgs/page/job-single/updated.svg') }}"
                                        alt="joblist"></div>
                                <div class="ml-10 sidebar-text-info"><span class="mb-10 text-description jobtype-icon min_w">Yêu
                                        cầu trình độ: </span><strong
                                        class="small-heading">{{ $job->jobEduction?->name }}</strong></div>
                            </div>
                            <div class="col-md-6 d-flex mt-sm-15">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('fontend/assets/imgs/page/job-single/location.svg') }}"
                                        alt="joblist">
                                </div>
                                <div class="ml-10 sidebar-text-info"><span class="mb-10 min_w_lc text-description">Địa điểm:
                                    </span><strong
                                        class="small-heading">{{ formatLocation($job->country?->name, $job->city?->name, $job->district?->name, $job->address) }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-single">
                        {!! $job->description !!}
                    </div>
                    <div class="mt-2 author-single"><span>{{ $job->company->name }}</span></div>
                    <div class="single-apply-jobs">
                        <div class="row align-items-center">
                            <div class="col-md-5"><a class="btn btn-border" href="#">Save job</a></div>
                            <div class="col-md-7 text-lg-end social-share">
                                <h6 class="mr-10 color-text-paragraph-2 d-inline-block d-baseline">Chia sẻ: </h6>
                                <a data-social="facebook" class="mr-5 d-inline-block d-middle" href="#"><img
                                        alt="joblist"
                                        src="{{ asset('fontend/assets/imgs/template/icons/share-fb.svg') }}"></a>
                                <a data-social="twitter" class="mr-5 d-inline-block d-middle" href="#"><img
                                        alt="joblist"
                                        src="{{ asset('fontend/assets/imgs/template/icons/share-tw.svg') }}"></a>
                                <a data-social="linkedin" class="d-inline-block d-middle" href="#"><img
                                        alt="joblist"
                                        src="{{ asset('fontend/assets/imgs/template/icons/linkedin.svg') }}"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pl-40 col-lg-4 col-md-12 col-sm-12 col-12 pl-lg-15 mt-lg-30">
                    <div class="sidebar-border">
                        <div class="sidebar-heading">
                            <div class="avatar-sidebar">
                                <figure><img alt="joblist" src="{{ asset($job->company->logo) }}"></figure>
                                <div class="sidebar-info"><span
                                        class="sidebar-company">{{ $job->company->name }}</span><span
                                        class="mt-1 card-location">{{ formatLocation($job->company->companyCountry->name) }}</span>
                                    @if ($openJobs > 0)
                                        <a class="link-underline mt-15"
                                            href="{{ route('companies.show', $job->company->slug) }}">{{ $openJobs }}
                                            Tin tuyển Dụng</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-list-job">
                            <div class="box-map">
                                {!! $job->company->map_link !!}
                            </div>
                            <ul class=" ul-disc">
                                <li class="">
                                    {{ formatLocation($job->country?->name, $job->city?->name, $job->district?->name, $job->address) }}
                                </li>

                                <li>Phone: {{ $job->company->phone }}</li>
                                <li>Email: {{ $job->company->email }}</li>
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-border">
                        <div class="sidebar-heading">
                            <h6 class="f-18">Yêu cầu kỹ năng</h6>
                        </div>
                        <div class="sidebar-list-job">
                            @foreach ($job->skills as $jobSkill)
                                <a class="mt-2 mr-5 btn btn-grey-small job-skill"
                                    href="javascript:;">{{ $jobSkill->skill->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    {{-- <div class="sidebar-border">
            <div class="sidebar-heading">
                <h6 class="f-18">Benefits</h6>
            </div>
            <div class="sidebar-list-job">
                @foreach ($job->benefits as $jobBenefit)
                    <a class="mt-2 mr-5 btn btn-grey-small job-skill" href="javascript:;">{{ $jobBenefit->benefit->name }}</a>
                @endforeach
            </div>
          </div> --}}

                    <div class="sidebar-border">
                        <div class="sidebar-heading">
                            <h6 class="f-18">Tags</h6>
                        </div>
                        <div class="sidebar-list-job">
                            @foreach ($job->tags as $jobTag)
                                <a class="mt-2 mr-5 btn btn-grey-small job-skill"
                                    href="javascript:;">{{ $jobTag->tag->name }}</a>
                            @endforeach
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
        $('.apply-now').on('click', function() {
            $.ajax({
                method: 'POST',
                url: "{{ route('apply-job.store', $job->id) }}",
                data: {_token:"{{ csrf_token() }}"},
                beforeSend: function() {

                },
                success: function(response) {
                    notyf.success(response.message);
                },
                error: function(xhr, status, error) {
                    let erorrs = xhr.responseJSON.errors;
                    $.each(erorrs, function(index, value) {
                        notyf.error(value[index]);
                    });
                }
            })
        })
    })
  </script>
@endpush
