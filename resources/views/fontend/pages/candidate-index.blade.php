@extends('fontend.layouts.master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Ứng viên</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('home') }}">Trang chủ</a></li>
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
                                <form action="{{ route('candidates.index') }}" method="GET">
                                    @csrf
                                    <div class="filter-block mb-30">
                                        <div class="filter-block head-border mb-30">
                                            <h5>Tìm kiếm nhanh <a class="link-reset"
                                                    href="{{ route('candidates.index') }}">Tạo
                                                    lại</a></h5>
                                        </div>

                                        <div class="filter-block mb-30">
                                            <div class="form-group select-style">
                                                <label class="mb-2 f-18">Kỹ năng</label>
                                                <select name="skills[]" multiple
                                                    class="form-control form-icons select-active">
                                                    <option value="" > All</option>
                                                    @foreach ($skills as $skill)
                                                        <option  @selected(request()->has('skills') ? in_array($skill->slug, request()->skills) : false) value="{{ $skill->slug }}"> {{ $skill->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="filter-block mb-30">
                                            <div class="form-group select-style">
                                                <label class="mb-2 f-18">Khả năng ngôn ngữ</label>
                                                <select name="languages[]" multiple
                                                    class="form-control form-icons select-active">
                                                    <option value="" > All</option>
                                                    @foreach ($languages as $lang)
                                                        <option  @selected(request()->has('languages') ? in_array($lang->slug, request()->languages) : false) value="{{ $lang->slug }}"> {{ $lang->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-20 filter-block">
                                        <h5 class="medium-heading mb-15">Kinh nghiệm</h5>
                                        <div class="form-group">
                                            <ul class="list-checkbox">
                                                <li class="active">
                                                    <label class="d-flex">
                                                        <input type="radio" name="experience" class="x-radio"
                                                            value=""><span class="text-small">All</span>
                                                    </label>
                                                </li>
                                                @foreach ($experiences as $ex)
                                                    <li class="active">
                                                        <label class="d-flex">
                                                            <input type="radio" @checked($ex->id == request()->ex) name="experience" class="x-radio" value="{{ $ex->id }}"><span class="text-small">{{ $ex->name }}</span>
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
                    <div class="col-xl-9">
                        <div class="row">
                            @forelse ($candidates as $item)
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up">
                                        <div class="text-center card-grid-2-image-left">
                                            <div class="mx-auto text-center card-grid-2-image-rd online pe-0">
                                                <a class="text-center text-decoration-none d-block"
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
                                                    class="text-center font-xs d-block color-text-mutted">{{ $item->title }}</span>
                                                <div class="pt-5 rate-reviews-small">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            @if ($item->status === 'available')
                                            <p class="mt-1 text-center font-md d-block color-text-paragraph-2 color_main1">Sẵn sàng nhận việc</p>
                                        @else
                                            <p class="mt-1 text-center font-md d-block color-text-paragraph-2 color_main2">Không sẵn sàng nhận việc</p>
                                        @endif
                                            <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                <div class="text-start">
                                                    @foreach ($item->skills as $key => $canSkill)
                                                        @if ($loop->index <= 5)
                                                            <a class="mb-10 mr-5 btn btn-tags-sm tag-skill-can"
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
                                                            <span
                                                                class="font-sm color-text-mutted">{{ $item->candidateCountry->name }}</span>
                                                        </span>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <a href="{{ route('candidates.show', $item->slug) }}"
                                                            class="view-detail-resume text-decoration-none text-success font-md text-capitalize d-inline-block ">Xem
                                                            hồ sơ</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h5 class="text-center">Tiếc quá không tìm thấy dữ liệu! 😥</h5>
                            @endforelse
                            <div class="col-12">
                                <div class="paginations mt-35">
                                    <ul class="pager">
                                        @if ($candidates->hasPages())
                                            {{ $candidates->withQueryString()->links() }}
                                        @endif
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
