<section class="section-box category_section">
    <div class="section-box wow animate__animated animate__fadeIn">
        <div class="container">
            <div class="text-center">
                <h2 class="mb-10 section-title wow animate__animated animate__fadeInUp">Nhóm ngành phổ biến</h2>
                <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">{{ $jobCount}} tin
                    tuyển dụng đang có</p>
            </div>
            <div class="box-swiper mt-50">
                <div class="swiper-container swiper-group-5 swiper">
                    <div class="pt-5 swiper-wrapper pb-70">
                        @foreach ($popularJobCategories->chunk(2) as $pair)

                        <div class="swiper-slide hover-up">
                            @foreach ($pair as $category)
                            <a href="{{ route('jobs.index', ['category' => $category->slug]) }}">
                              <div class="item-logo">
                                <div class="image-left">
                                  <i class="{{ $category->icon }}"></i>
                                </div>
                                <div class="text-info-right">
                                  <h4>{{ Str::limit($category->name, 20, '...') }}</h4>
                                  <p class="font-xs  {{ optional($category)->jobs_count > 0 ? 'active' : '' }}">{{ $category->jobs_count }}<span> Tin tuyển dụng</span></p>
                                </div>
                              </div>
                            </a>
                            @endforeach

                          </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</section>
