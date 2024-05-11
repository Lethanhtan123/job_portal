@extends('fontend.layouts.master')
@section('contents')
<section class="section-box mt-75">
    <div class="breacrumb-cover">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <h2 class="mb-20">Company Home</h2>
                    <ul class="breadcrumbs">
                        <li><a class="home-icon" href="{{ route('companies.index') }}">Home</a></li>
                        <li>Company Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-box-2">
    <div class="container">
        <div class="box-company-profile">
            <div class="mt-10 row">
                <div class="col-lg-8 col-md-12">
                    <div class="logo_company"><img src="{{ $company->logo }}" alt="joblist"></div>

                    <h5 class="f-18">{{ $company->name }} <span class="ml-20 card-location font-regular">{{ $company->companyCountry->name }}</span></h5>
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
                            <h4>Welcome to {{ $company->name }}</h4>
                            <p>{{$company->bio}}</p>
                        </div>

                    </div>
                </div>
                <div class="box-related-job content-page" id="openposition">
                    <h5 class="mb-30">Latest Jobs</h5>
                    <div class="box-list-jobs display-list">
                        <div class="col-xl-12 col-12">
                            <div class="card-grid-2 hover-up"><span class="flash"></span>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="card-grid-2-image-left">
                                            <div class="image-box"><img src="assets/imgs/brands/brand-6.png"
                                                    alt="joblist"></div>
                                            <div class="right-info"><a class="name-job" href="">Quora JSC</a><span
                                                    class="location-small">New York, US</span></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                        <div class="pl-15 mb-15 mt-30"><a class="mr-5 btn btn-grey-small" href="#">Adobe
                                                XD</a><a class="mr-5 btn btn-grey-small" href="#">Figma</a></div>
                                    </div>
                                </div>
                                <div class="card-block-info">
                                    <h4><a href="job-details.html">Senior System Engineer</a></h4>
                                    <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                            class="card-time"><span>5</span><span> mins ago</span></span></div>
                                    <p class="mt-10 font-sm color-text-paragraph">Lorem ipsum dolor sit amet,
                                        consectetur adipisicing
                                        elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                    <div class="mt-20 card-2-bottom">
                                        <div class="row">
                                            <div class="col-lg-7 col-7"><span class="card-text-price">$800</span><span
                                                    class="text-muted">/Hour</span></div>
                                            <div class="col-lg-5 col-5 text-end">
                                                <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                    data-bs-target="#ModalApplyJobForm">
                                                    Apply now</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-12">
                            <div class="card-grid-2 hover-up"><span class="flash"></span>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="card-grid-2-image-left">
                                            <div class="image-box"><img src="assets/imgs/brands/brand-7.png"
                                                    alt="joblist"></div>
                                            <div class="right-info"><a class="name-job" href="">Nintendo</a><span
                                                    class="location-small">New York, US</span></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                        <div class="pl-15 mb-15 mt-30"><a class="mr-5 btn btn-grey-small" href="#">Adobe
                                                XD</a><a class="mr-5 btn btn-grey-small" href="#">Figma</a></div>
                                    </div>
                                </div>
                                <div class="card-block-info">
                                    <h4><a href="job-details.html">Products Manager</a></h4>
                                    <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                            class="card-time"><span>6</span><span> mins ago</span></span></div>
                                    <p class="mt-10 font-sm color-text-paragraph">Lorem ipsum dolor sit amet,
                                        consectetur adipisicing
                                        elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                    <div class="mt-20 card-2-bottom">
                                        <div class="row">
                                            <div class="col-lg-7 col-7"><span class="card-text-price">$250</span><span
                                                    class="text-muted">/Hour</span></div>
                                            <div class="col-lg-5 col-5 text-end">
                                                <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                    data-bs-target="#ModalApplyJobForm">
                                                    Apply now</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-12">
                            <div class="card-grid-2 hover-up"><span class="flash"></span>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="card-grid-2-image-left">
                                            <div class="image-box"><img src="assets/imgs/brands/brand-8.png"
                                                    alt="joblist"></div>
                                            <div class="right-info"><a class="name-job" href="">Periscope</a><span
                                                    class="location-small">New York, US</span></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                        <div class="pl-15 mb-15 mt-30"><a class="mr-5 btn btn-grey-small" href="#">Adobe
                                                XD</a><a class="mr-5 btn btn-grey-small" href="#">Figma</a></div>
                                    </div>
                                </div>
                                <div class="card-block-info">
                                    <h4><a href="job-details.html">Lead Quality Control QA</a></h4>
                                    <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                            class="card-time"><span>6</span><span> mins ago</span></span></div>
                                    <p class="mt-10 font-sm color-text-paragraph">Lorem ipsum dolor sit amet,
                                        consectetur adipisicing
                                        elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                    <div class="mt-20 card-2-bottom">
                                        <div class="row">
                                            <div class="col-lg-7 col-7"><span class="card-text-price">$250</span><span
                                                    class="text-muted">/Hour</span></div>
                                            <div class="col-lg-5 col-5 text-end">
                                                <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                    data-bs-target="#ModalApplyJobForm">
                                                    Apply now</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="paginations mt-60">
                        <ul class="pager">
                            <li><a class="pager-prev" href="#"><i class="fas fa-arrow-left"></i></a></li>
                            <li><a class="pager-number" href="#">1</a></li>
                            <li><a class="pager-number" href="#">2</a></li>
                            <li><a class="pager-number active" href="#">3</a></li>
                            <li><a class="pager-number" href="#">4</a></li>
                            <li><a class="pager-next" href="#"><i class="fas fa-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="pl-40 col-lg-4 col-md-12 col-sm-12 col-12 pl-lg-15 mt-lg-30">
                <div class="sidebar-border">
                    <div class="sidebar-heading">
                        <div class="avatar-sidebar">
                            <div class="pl-0 sidebar-info"><span class="sidebar-company">{{ $company->name }}</span><span
                                    class="card-location">{{ $company->companyCountry->name }}</span></div>
                        </div>
                    </div>
                    <div class="sidebar-list-job">
                        <div class="box-map">
                           {!! $company->map_link !!}
                        </div>
                    </div>
                    <div class="sidebar-list-job">
                        <ul>
                            <li>
                                <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                <div class="sidebar-text-info"><span class="text-description">Company
                                        field</span><strong class="small-heading"></strong></div>
                            </li>
                            <li>
                                <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                                <div class="sidebar-text-info"><span class="text-description">Location</span><strong
                                        class="small-heading">{{ $company->companyCountry->name }}</strong></div>
                            </li>

                            <li>
                                <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                                <div class="sidebar-text-info"><span class="text-description">Establis Date</span><strong
                                        class="small-heading">{{ formatDate($company->establishment_date) }}</strong></div>
                            </li>
                            <li>
                                <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                                <div class="sidebar-text-info"><span class="text-description">Last Jobs
                                        Posted</span><strong class="small-heading">4 days</strong></div>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar-list-job">
                        <ul class="ul-disc">
                            <li>Adress: {{ $company->address }} ,{{ $company->companyCountry->name }}</li>
                            <li>Phone: {{ $company->phone }}</li>
                            <li>Email: {{ $company->email }}</li>
                        </ul>
                        <div class="mt-30"><a class="btn btn-send-message" href="mailto:{{ $company->email }}">Send Message</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
