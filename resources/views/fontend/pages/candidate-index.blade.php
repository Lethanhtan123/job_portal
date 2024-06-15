@extends('fontend.layouts.master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Ứng viên</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Ứng viên</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="content-page">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="sidebar-shadow none-shadow mb-30">
                            <div class="sidebar-filters">
                                <div class="filter-block mb-30">
                                    <div class="filter-block head-border mb-30">
                                        <h5>Advance Filter <a class="link-reset" href="#">Reset</a></h5>
                                    </div>
                                    <div class="mb-20 filter-block">
                                        <div class="form-group select-style">
                                            <select class="form-control form-icons select-active">
                                                <option>New York, US</option>
                                                <option>London</option>
                                                <option>Paris</option>
                                                <option>Berlin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="filter-block mb-30">
                                        <div class="form-group select-style">
                                            <select class="form-control form-icons select-active">
                                                <option>Industry</option>
                                                <option>London</option>
                                                <option>Paris</option>
                                                <option>Berlin</option>
                                            </select>
                                            <button class="mt-10 submit btn btn-default rounded-1 w-100"
                                                type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-20 filter-block">
                                    <h5 class="medium-heading mb-15">Industry</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span
                                                        class="text-small">All</span><span class="checkmark"></span>
                                                </label><span class="number-item">180</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Software</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">12</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Finance</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">23</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Recruting</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">43</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Management</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">65</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Advertising</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">76</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="mb-20 filter-block">
                                    <h5 class="medium-heading mb-25">Salary Range</h5>
                                    <div class="pb-20 list-checkbox">
                                        <div class="mt-10 mb-20 row position-relative">
                                            <div class="col-sm-12 box-slider-range">
                                                <div id="slider-range"></div>
                                            </div>
                                            <div class="box-input-money">
                                                <input class="input-disabled form-control min-value-money" type="text"
                                                    name="min-value-money" disabled="disabled" value="">
                                                <input class="form-control min-value" type="hidden" name="min-value"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="box-number-money">
                                            <div class="row mt-30">
                                                <div class="col-sm-6 col-6"><span class="font-sm color-brand-1">$0</span>
                                                </div>
                                                <div class="col-sm-6 col-6 text-end"><span
                                                        class="font-sm color-brand-1">$500</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-20 form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span
                                                        class="text-small">All</span><span class="checkmark"></span>
                                                </label><span class="number-item">145</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">$0k - $20k</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">56</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">$20k - $40k</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">37</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">$40k -
                                                        $60k</span><span class="checkmark"></span>
                                                </label><span class="number-item">75</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">$60k -
                                                        $80k</span><span class="checkmark"></span>
                                                </label><span class="number-item">98</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">$80k -
                                                        $100k</span><span class="checkmark"></span>
                                                </label><span class="number-item">14</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">$100k -
                                                        $200k</span><span class="checkmark"></span>
                                                </label><span class="number-item">25</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="mb-10 medium-heading">Popular Keyword</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span
                                                        class="text-small">Software</span><span class="checkmark"></span>
                                                </label><span class="number-item">24</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Developer</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">45</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Web</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">57</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="mb-10 medium-heading">Position</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Senior</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">12</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span
                                                        class="text-small">Junior</span><span class="checkmark"></span>
                                                </label><span class="number-item">35</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Fresher</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">56</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="mb-10 medium-heading">Experience Level</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Internship</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">56</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Entry
                                                        Level</span><span class="checkmark"></span>
                                                </label><span class="number-item">87</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span
                                                        class="text-small">Associate</span><span class="checkmark"></span>
                                                </label><span class="number-item">24</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Mid Level</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">45</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Director</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">76</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Executive</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">89</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="mb-10 medium-heading">Onsite/Remote</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">On-site</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">12</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span
                                                        class="text-small">Remote</span><span class="checkmark"></span>
                                                </label><span class="number-item">65</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Hybrid</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">58</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <h5 class="mb-10 medium-heading">Job Posted</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span
                                                        class="text-small">All</span><span class="checkmark"></span>
                                                </label><span class="number-item">78</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">1 day</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">65</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">7 days</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">24</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">30 days</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">56</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="mb-20 filter-block">
                                    <h5 class="medium-heading mb-15">Job type</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Full Time</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">25</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" checked="checked"><span
                                                        class="text-small">Part
                                                        Time</span><span class="checkmark"></span>
                                                </label><span class="number-item">64</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Remote
                                                        Jobs</span><span class="checkmark"></span>
                                                </label><span class="number-item">78</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Freelancer</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">97</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="box-filters-job">
                            <div class="row">
                                <div class="col-xl-6 col-lg-5"><span class="text-small text-showing">Showing <strong>41-60
                                        </strong>of
                                        <strong>944 </strong>jobs</span></div>
                                <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                                    <div class="display-flex2">
                                        <div class="box-border mr-10"><span class="text-sortby">Show:</span>
                                            <div class="dropdown dropdown-sort">
                                                <button class="btn dropdown-toggle" id="dropdownSort" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-display="static"><span>12</span><i
                                                        class="fi-rr-angle-small-down"></i></button>
                                                <ul class="dropdown-menu dropdown-menu-light"
                                                    aria-labelledby="dropdownSort">
                                                    <li><a class="dropdown-item active" href="#">10</a></li>
                                                    <li><a class="dropdown-item" href="#">12</a></li>
                                                    <li><a class="dropdown-item" href="#">20</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="box-border"><span class="text-sortby">Sort by:</span>
                                            <div class="dropdown dropdown-sort">
                                                <button class="btn dropdown-toggle" id="dropdownSort2" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-display="static"><span>Newest Post</span><i
                                                        class="fi-rr-angle-small-down"></i></button>
                                                <ul class="dropdown-menu dropdown-menu-light"
                                                    aria-labelledby="dropdownSort2">
                                                    <li><a class="dropdown-item active" href="#">Newest Post</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Oldest Post</a></li>
                                                    <li><a class="dropdown-item" href="#">Rating Post</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @forelse ($candidates as $item)
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left text-center">
                                            <div class="card-grid-2-image-rd online text-center pe-0 mx-auto">
                                                <a class="text-decoration-none text-center d-block"
                                                    href="{{ route('candidates.show', $item->slug) }}">
                                                    <figure>
                                                        <img alt="{{ $item->full_name }}" src="{{ asset($item->image) }}">
                                                    </figure>
                                                </a>
                                            </div>
                                            <div class="pt-10 card-profile">
                                                <a class="mb-3" href="{{ route('candidates.show', $item->slug) }}">
                                                    <h5 class="text-center">{{ $item->full_name }}</h5>
                                                </a>
                                                <span
                                                    class="font-xs d-block text-center color-text-mutted">{{ $item->title }}</span>
                                                <div class="pt-5 rate-reviews-small">
                                                    {{-- <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" viewBox="0 0 12 12" fill="none">
                                                            <g clip-path="url(#clip0_1933_3717)">
                                                                <path
                                                                    d="M11.9687 4.60323C11.8902 4.36024 11.6746 4.18766 11.4197 4.16468L7.95614 3.85019L6.58656 0.644572C6.48558 0.409641 6.25559 0.257568 6.00006 0.257568C5.74453 0.257568 5.51454 0.409641 5.41356 0.645121L4.04399 3.85019L0.579908 4.16468C0.325385 4.18821 0.110414 4.36024 0.0314019 4.60323C-0.0476102 4.84622 0.0253592 5.11273 0.2179 5.28074L2.83592 7.57676L2.06392 10.9774C2.00744 11.2274 2.10448 11.4859 2.31195 11.6358C2.42346 11.7164 2.55393 11.7574 2.68549 11.7574C2.79893 11.7574 2.91145 11.7269 3.01244 11.6664L6.00006 9.88083L8.98659 11.6664C9.20513 11.7979 9.48062 11.7859 9.68762 11.6358C9.89518 11.4854 9.99214 11.2269 9.93565 10.9774L9.16366 7.57676L11.7817 5.2812C11.9742 5.11273 12.0477 4.84667 11.9687 4.60323Z"
                                                                    fill="#FFBD27" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_1933_3717">
                                                                    <rect width="12" height="12" fill="white" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        <img src="assets/imgs/template/icons/star.svg" alt="joblist">
                                                    </span>
                                                    <span>
                                                        <img src="assets/imgs/template/icons/star.svg" alt="joblist">
                                                    </span>
                                                    <span>
                                                        <img src="assets/imgs/template/icons/star.svg" alt="joblist">
                                                    </span>
                                                    <span>
                                                        <img src="assets/imgs/template/icons/star.svg" alt="joblist">
                                                    </span>
                                                    <span class="ml-10 color-text-mutted font-xs">(65)</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            @if ($item->status === 'available')
                                                <p class="font-md d-block text-center color-text-paragraph-2">Sẵn sàng nhận
                                                    việc</p>
                                            @endif
                                            <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                <div class="text-start">
                                                    @foreach ($item->skills as $key => $canSkill)
                                                        @if ($loop->index <= 5)
                                                            <a class="mb-10 mr-5 btn btn-tags-sm"
                                                                href="">{{ $canSkill->skill->name }}</a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="employers-info align-items-center justify-content-center mt-15">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <span class="d-flex align-items-center">
                                                            <i class="ml-0 mr-5 fi-rr-marker"></i>
                                                            <span class="font-sm color-text-mutted">{{ $item->candidateCountry->name }}</span>
                                                        </span>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <a href="{{ route('candidates.show', $item->slug) }}" class="view-detail-resume text-decoration-none text-success font-md text-capitalize d-inline-block " >Xem hồ sơ</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                            <div class="col-12">
                                <div class="paginations mt-35">
                                    <ul class="pager">
                                        <li><a class="pager-prev" href="#"><i class="fas fa-arrow-left"></i></a>
                                        </li>
                                        <li><a class="pager-number" href="#">1</a></li>
                                        <li><a class="pager-number" href="#">2</a></li>
                                        <li><a class="pager-number" href="#">3</a></li>
                                        <li><a class="pager-number" href="#">4</a></li>
                                        <li><a class="pager-next" href="#"><i class="fas fa-arrow-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
