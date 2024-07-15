@extends('fontend.layouts.master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Thông tin nhà tuyển dụng</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('companies.index') }}">Trang chủ</a></li>
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
                                class="ml-20 card-location font-regular">{{ $company->companyCity->name }}, {{ $company->companyCountry->name }}</span></h5>
                    </div>

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
                                                        <a class="mb-2 me-2 btn btn-grey-small job-skill"
                                                            href="javascript:;">{{ $jobSkill->skill->name }}</a>
                                                    @elseif ($loop->index == 7)
                                                        <a class="mr-2 btn btn-grey-small job-skill"
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
                                                        <div class="border-0 btn bookmark-btn job-bookmark"
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
                                        class="mt-1 card-location">  {{ formatLocation($company->companyCountry?->name,$company->companyCity?->name,$company->companyDistrict?->name) }}</span>
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
                                    {{-- {{ formatLocation($company->companyCountry->name) }} --}}
                                     {{ formatLocation($company->companyCountry?->name, $company->companyCity?->name, $company->companyDistrict?->name, $company->address) }}
                                </li>

                                <li>Phone: {{ $company->phone }}</li>
                                <li>Email: {{ $company->email }}</li>

                            </ul>
                            <div class="mt-30">
                                <a class="btn btn-send-message" href="mailto:{{ $company->email }}">Send Email</a>
                                @if ($company->zalo)
                                    <a class="btn btn-chat-zalo btn-send-message" target="_blank"
                                        href="https://zalo.me/{{ $company->zalo }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100"
                                            height="100" viewBox="0 0 50 50">
                                            <path
                                                d="M 9 4 C 6.2504839 4 4 6.2504839 4 9 L 4 41 C 4 43.749516 6.2504839 46 9 46 L 41 46 C 43.749516 46 46 43.749516 46 41 L 46 9 C 46 6.2504839 43.749516 4 41 4 L 9 4 z M 9 6 L 15.576172 6 C 12.118043 9.5981082 10 14.323627 10 19.5 C 10 24.861353 12.268148 29.748596 15.949219 33.388672 C 15.815412 33.261195 15.988635 33.48288 16.005859 33.875 C 16.023639 34.279773 15.962689 34.835916 15.798828 35.386719 C 15.471108 36.488324 14.785653 37.503741 13.683594 37.871094 A 1.0001 1.0001 0 0 0 13.804688 39.800781 C 16.564391 40.352722 18.51646 39.521812 19.955078 38.861328 C 21.393696 38.200845 22.171033 37.756375 23.625 38.34375 A 1.0001 1.0001 0 0 0 23.636719 38.347656 C 26.359037 39.41176 29.356235 40 32.5 40 C 36.69732 40 40.631169 38.95117 44 37.123047 L 44 41 C 44 42.668484 42.668484 44 41 44 L 9 44 C 7.3315161 44 6 42.668484 6 41 L 6 9 C 6 7.3315161 7.3315161 6 9 6 z M 18.496094 6 L 41 6 C 42.668484 6 44 7.3315161 44 9 L 44 34.804688 C 40.72689 36.812719 36.774644 38 32.5 38 C 29.610147 38 26.863646 37.459407 24.375 36.488281 C 22.261967 35.634656 20.540725 36.391201 19.121094 37.042969 C 18.352251 37.395952 17.593707 37.689389 16.736328 37.851562 C 17.160501 37.246758 17.523335 36.600775 17.714844 35.957031 C 17.941109 35.196459 18.033096 34.45168 18.003906 33.787109 C 17.974816 33.12484 17.916946 32.518297 17.357422 31.96875 L 17.355469 31.966797 C 14.016928 28.665356 12 24.298743 12 19.5 C 12 14.177406 14.48618 9.3876296 18.496094 6 z M 32.984375 14.986328 A 1.0001 1.0001 0 0 0 32 16 L 32 25 A 1.0001 1.0001 0 1 0 34 25 L 34 16 A 1.0001 1.0001 0 0 0 32.984375 14.986328 z M 18 16 A 1.0001 1.0001 0 1 0 18 18 L 21.197266 18 L 17.152344 24.470703 A 1.0001 1.0001 0 0 0 18 26 L 23 26 A 1.0001 1.0001 0 1 0 23 24 L 19.802734 24 L 23.847656 17.529297 A 1.0001 1.0001 0 0 0 23 16 L 18 16 z M 29.984375 18.986328 A 1.0001 1.0001 0 0 0 29.162109 19.443359 C 28.664523 19.170123 28.103459 19 27.5 19 C 25.578848 19 24 20.578848 24 22.5 C 24 24.421152 25.578848 26 27.5 26 C 28.10285 26 28.662926 25.829365 29.160156 25.556641 A 1.0001 1.0001 0 0 0 31 25 L 31 22.5 L 31 20 A 1.0001 1.0001 0 0 0 29.984375 18.986328 z M 38.5 19 C 36.578848 19 35 20.578848 35 22.5 C 35 24.421152 36.578848 26 38.5 26 C 40.421152 26 42 24.421152 42 22.5 C 42 20.578848 40.421152 19 38.5 19 z M 27.5 21 C 28.340272 21 29 21.659728 29 22.5 C 29 23.340272 28.340272 24 27.5 24 C 26.659728 24 26 23.340272 26 22.5 C 26 21.659728 26.659728 21 27.5 21 z M 38.5 21 C 39.340272 21 40 21.659728 40 22.5 C 40 23.340272 39.340272 24 38.5 24 C 37.659728 24 37 23.340272 37 22.5 C 37 21.659728 37.659728 21 38.5 21 z">
                                            </path>
                                        </svg>
                                        Chat Zalo
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
