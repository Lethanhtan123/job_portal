@extends('fontend.layouts.master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Trang cá nhân</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Trang chủ</a></li>
                            <li>Chi tiết Ứng viên</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box-2 py-5">
        <div class="container">
            <div class="banner-hero banner-image-single avt-can"><img src="{{ asset($candidate->image) }}" alt="joblist">
            </div>
            <div class="box-company-profile">
                <div class="row mt-10">
                    <div class="col-lg-8 col-md-12">
                        <h5 class="f-22">{{ $candidate->full_name }} <span
                                class="card-location font-regular ml-20">{{ $candidate->candidateCity->name . ', ' . $candidate->candidateCountry->name }}</span>
                        </h5>
                        <p class="mt-0 font-lg color-text-paragraph-2 mb-15">{{ $candidate->title }}</p>
                        {{-- <div class="mt-0 mb-15 d-flex flex-wrap align-items-center">
                            <img src="assets/imgs/template/icons/star.svg" alt="joblist">
                            <img src="assets/imgs/template/icons/star.svg" alt="joblist">
                            <img src="assets/imgs/template/icons/star.svg" alt="joblist">
                            <img src="assets/imgs/template/icons/star.svg" alt="joblist">
                            <img src="assets/imgs/template/icons/star.svg" alt="joblist">
                            <span class="font-xs color-text-mutted ml-10">(66)</span>
                            <img class="ml-30" src="assets/imgs/page/candidates/verified.png" alt="joblist">
                        </div> --}}
                    </div>
                    @if ($candidate->cv)
                        <div class="col-lg-4 col-md-12 text-lg-end"><a target="_blank"
                                class="btn btn-download-icon btn-apply btn-apply-big"
                                href="{{ asset($candidate->cv) }}">Download CV</a></div>
                    @endif
                </div>
            </div>

            <div class="border-bottom pt-10 pb-10"></div>
        </div>
    </section>

    <section class="section-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="content-single">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-short-bio" role="tabpanel"
                                aria-labelledby="tab-short-bio">
                                <h4 class="mt-0">Tiểu sử</h4>
                                <div>
                                    {!! $candidate->bio !!}
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="box-related-job content-page   cadidate_details_list">
                        <div class="my-3">
                            <div class="w-ex-page mb-5">
                                <h4>Kinh nghiệm</h4>
                                <ul class="timeline">
                                    @foreach ($candidate->candidateExperience as $canEx)
                                        <li>
                                            <a class="float-right">{{ formatDate($canEx->start) }} -
                                                {{ $canEx->currently_working ? 'Hiện tại' : formatDate($canEx->end) }}</a>
                                            <a class="f-18">{{ $canEx->designation }}</a> |
                                            <span>{{ $canEx->department }}</span>

                                            <p>{{ $canEx->company }}</p>
                                            <p>{{ $canEx->responsibilities }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="w-ex-page pt-3">
                                <h4>Trình độ - Bằng cấp</h4>
                                <ul class="timeline">
                                    @foreach ($candidate->candidateEducation as $canEdu)
                                        <li>
                                            <a class="float-right">{{ formatDate($canEdu->year) }}</a>
                                            <a class="f-18">{{ $canEdu->level }}</a>

                                            <p>{{ $canEdu->degree }}</p>
                                            <p>{{ $canEdu->note }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                    <div class="sidebar-border sidebar_fixed ">
                        <h5 class="f-18">Thông tin khác</h5>
                        <div class="sidebar-list-job">
                            <ul>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description w-100">Nghề nghiệp</span>
                                        <strong class="small-heading">{{ $candidate->profession->name }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description w-100">Kinh nghiệm làm
                                            việc</span>
                                        <strong class="small-heading">{{ $candidate->experience->name }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                    <div class="sidebar-text-info s-end"><span class="text-description w-100">Kỹ
                                            năng</span>
                                        @foreach ($candidate->skills as $canSkill)
                                            <span
                                                class="small-heading btn-sm btn-success">{{ $canSkill->skill->name }}</span>
                                        @endforeach
                                    </div>
                                </li>

                                <li>
                                    <div class="sidebar-icon-item"><img src="{{ asset('fontend/assets/imgs/template/language.png') }}" title="Khả năng" alt="                                            ngôn ngữ<" ></div>
                                    <div class="sidebar-text-info s-end"><span class="text-description w-100">Khả năng
                                            ngôn ngữ</span>
                                        @foreach ($candidate->languages as $canLang)
                                            <span
                                                class="small-heading btn-sm btn-success">{{ $canLang->language->name }}</span>
                                        @endforeach
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><img src="{{ asset('fontend/assets/imgs/template/calendar-birhtday-cake.png') }}" title="Ngày sinh" alt="Ngày sinh" ></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description w-100">Ngày sinh</span>
                                        <strong class="small-heading">{{ formatDate($candidate->birth_date) }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi fi-rr-venus-mars"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description w-100">Giới tính</span>
                                        <strong class="small-heading">{{ $candidate->gender }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description w-100">Tình trạng hôn nhân</span>
                                        <strong class="small-heading">{{ $candidate->marital_status }}</strong>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="sidebar-list-job">
                            <ul class="ul-disc">
                                <li>{{ $candidate->address }}
                                    {{ $candidate->candidateCity?->name ? ', ' . $candidate->candidateCity?->name : '' }}
                                    {{ $candidate->candidateState?->name ? ', ' . $candidate->candidateState?->name : '' }}
                                    {{ $candidate->candidateCountry?->name ? ', ' . $candidate->candidateCountry?->name : '' }}
                                </li>
                                @if ($candidate->phone_one)
                                    <li>Điện thoại: {{ $candidate->phone_one }}</li>
                                @elseif ($candidate->phone_two)
                                    <li>Điện thoại: {{ $candidate->phone_two }}</li>
                                @endif
                                <li>Email: {{ $candidate->email }}</li>
                                <li>Website: <a class="w-t-w" href="{{ $candidate->website }}" > {{ $candidate->website }}</a></li>
                            </ul>
                            <div class="mt-30">
                                <a class="btn btn-send-message" href="mailto:{{ $candidate->email }}">Send Message</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
