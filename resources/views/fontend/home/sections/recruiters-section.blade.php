<section class="section-box recruiters mt-60">
    <div class="container">
        <div class="text-center">
            <h2 class="mb-10 section-title wow animate__animated animate__fadeInUp">Nhà Tuyển dụng</h2>
            <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Sự nghiệp của bạn, sự phát triển cho chúng tôi</p>
        </div>
    </div>
    <div class="container">
        <div class="box-swiper mt-50">
            <div class="swiper-container swiper-group-1 swiper-style-2 swiper">
                <div class="pt-5 swiper-wrapper">
                    <div class="swiper-slide">
                        @foreach ($companies as $company)
                        <div class="item-5 hover-up wow animate__animated animate__fadeIn">
                            <a href="{{ route('companies.show', $company->slug) }}">
                                <div class="item-logo">
                                    <div class="image-left"><img alt="joblist" src="{{ asset($company->logo) }}">
                                    </div>
                                    <div class="text-info-right">
                                        <h4>{{ $company->name }}</h4>
                                    </div>
           
           <div class="mt-5 text-info-bottom">


                                        <span
                                            class="card-location">

                                            {{ $company->companyDistrict->name . ', '. $company->companyCountry?->name }}</span>

                                            <span class="mt-5 text-center font-xs color-text-mutted d-block">

                                                <span class="{{ optional($company)->jobs_count > 0 ? 'have_job' : '' }}">
                                                    {{ $company->jobs_count }} Tin tuyển dụng</span></span></div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="swiper-button-next swiper-button-next-1"></div>
            <div class="swiper-button-prev swiper-button-prev-1"></div>
        </div>
    </div>
</section>
