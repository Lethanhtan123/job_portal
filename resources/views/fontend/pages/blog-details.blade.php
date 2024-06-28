@extends('fontend.layouts.master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Tin tức</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Trang chủ</a></li>
                            <li>{{ $blog->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box">
        <div class="pt-40 archive-header">
            <div class="container">
                <div class="">
                    <!-- <div class="max-width-single"><a class="btn btn-tag" href="#">Job Tips</a> -->
                    <h2 class="mt-20 mb-30">{{ $blog->title }}</h2>
                    <div class="mx-auto post-meta text-muted d-flex">
                        <div class="author d-flex mr-30"><span>{{ $blog->author->name }}</span></div>
                        <div class="date"><span class="mr-20 font-xs color-text-paragraph-2 d-inline-block">
                                {{ formatDate($blog->created_at) }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <div class="post-loop-grid">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-12">
                    <div class="single-body">

                        <figure><img style="height: 500px; width:100%; object-fit:cover" src="{{ asset($blog->image) }}">
                        </figure>
                        <div class="">
                            <div class="content-single">
                                {!! $blog->description !!}
                            </div>
                            <div class="mt-20 single-apply-jobs " >
                                <div class="row">
                                    <div class="col-md-5 text-lg-end social-share" style="text-align: left !important">
                                        <h6 class="mt-10 mr-20 color-text-paragraph-2 d-inline-block d-baseline">Share</h6>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
