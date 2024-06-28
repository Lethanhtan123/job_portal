@extends('fontend.layouts.master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Thông tin nhà tuyển dụng</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('companies.index') }}">Home</a></li>
                            <li>Thông tin nhà tuyển dụng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box-2">
        <div class="container">

            <div class="mt-30"></div>
            <div class="banner-hero banner-image-single"><img style="height: 374px; object-fit: cover;"
                    src="{{ asset($company->banner) }}" alt="joblist"></div>
            <div class="box-company-profile">
                <div class="mt-10 row">
                    <div class="col-lg-8 col-md-12">
                        {{-- <div class="logo_company"><img src="{{ $company->logo }}" alt="joblist"></div> --}}

                        <h5 class="f-18">{{ $company->name }} <span
                                class="ml-20 card-location font-regular">{{ $company->companyCountry->name }}</span></h5>
                    </div>
                    <div class="col-lg-4 col-md-12 text-lg-end"><a class="btn btn-apply btn-apply-big"
                            href="#openposition">Open position</a></div>
                </div>
            </div>

        </div>
    </section>

    <section class="mt-10 section-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12" style="border-top:#1ca7741a solid 1px">
                    <div class="content-single">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-about" role="tabpanel"
                                aria-labelledby="tab-about">
                                <h4>{{ $company->name }}</h4>
                                <p>{{ $company->bio }}</p>
                            </div>

                        </div>
                    </div>
                    <div class="box-related-job content-page" id="open-positions">
                        <h5 class="mb-30">Tin tuyển dụng</h5>
                        <div class="box-list-jobs display-list">
                            @forelse ($openJobs as $job)
                                <div class="col-xl-12 col-md-4">
                                    <div class="card-grid-2 hover-up"><span class="flash"></span>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="card-grid-2-image-left">
                                                    <div class="image-box"><img src="{{ asset($job->company->logo) }}"
                                                            alt="joblist"></div>
                                                    <div class="right-info"><a class="name-job"
                                                            href="{{ route('companies.show', $job->company->slug) }}">{{ $job->company->name }}</a><span
                                                            class="location-small">{{ formatLocation($job->company->companyCountry->name, $job->company?->companyState?->name) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
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
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h4><a href="{{ route('jobs.show', $job->slug) }}">{{ $job->title }}</a>
                                            </h4>
                                            <div class="mt-5">
                                                <span class="card-briefcase">{{ $job->jobType->name }}</span>
                                                <span class="card-briefcase">{{ $job->jobExperience?->name }}</span>
                                                <span
                                                    class="card-time"><span>{{ $job->created_at->diffForHumans() }}</span></span>
                                            </div>
                                            {{-- <p class="mt-10 font-sm color-text-paragraph">Lorem ipsum dolor sit amet,
                                        consectetur adipisicing
                                        elit. Recusandae architecto eveniet, dolor quo repellendus pariatur</p> --}}
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
                                                        <div class="col-lg-7 col-7"><span class="card-text-price">
                                                                {{ $job->min_salary }} - {{ $job->max_salary }}
                                                                {{ $job->tygia }}/VNĐ
                                                                {{ config('settings.site_default_currency') }}
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
                                                            auth()?->user()?->candidateProfile?->id,
                                                        )
                                                            ->pluck('job_id')
                                                            ->toArray();

                                                    @endphp

                                                    <div class="col-lg-5 col-5 text-end">
                                                        <div class="btn bookmark-btn job-bookmark"
                                                            data-id="{{ $job->id }}">

                                                            @if (in_array($job->id, $bookmarkedIds))
                                                                <i style=""
                                                                    class="fas fa-bookmark active-bookmark "></i>
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
                                <h5 class="text-center">Không có tin tuyển dụng! 😥</h5>
                            @endforelse

                        </div>

                        <div class="paginations">
                            <ul class="pager">
                                @if ($openJobs->hasPages())
                                    {{ $openJobs->withQueryString()->links() }}
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="pl-40 col-lg-4 col-md-12 col-sm-12 col-12 pl-lg-15 mt-lg-30">
                    <div class="sidebar-border">
                        <div class="sidebar-heading">
                            <div class="avatar-sidebar">
                                <figure><img alt="joblist" src="{{ asset($company->logo) }}"></figure>
                                <div class="sidebar-info"><span class="sidebar-company">{{ $company->name }}</span><span
                                        class="mt-1 card-location">{{ formatLocation($company->companyCountry->name) }}</span>
                                    {{-- @if ($openJobs > 0)
                                <a class="link-underline mt-15"
                                    href="{{route('companies.show', $job->company->slug)}}">{{ $openJobs }} Tin tuyển
                                    Dụng</a>
                                @endif --}}
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-list-job">
                            <div class="box-map">
                                {!! $company->map_link !!}
                            </div>
                            <ul class=" ul-disc">
                                <li class="">
                                    {{ formatLocation($company->companyCountry->name) }}
                                </li>

                                <li>Phone: {{ $company->phone }}</li>
                                <li>Email: {{ $company->email }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
