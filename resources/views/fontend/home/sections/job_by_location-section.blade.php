<section class="section-box mt-50">
    <div class="container">
        <div class="text-center">
            <h2 class="mb-10 section-title wow animate__animated animate__fadeInUp">Khu vực tuyển dụng</h2>
            <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Chúng tôi đồng hành cùng
                bạn trên mỗi bước đường.</p>
        </div>
    </div>
    <div class="container">
        <div class="row mt-50">
            @foreach ($locations as $location)
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">

                    <div class="card-image-top hover-up"><a href="{{ route('companies.index', ['district' => $location->country_id]) }}">

                            <div class="image" style="background-image: url({{ asset($location->image) }});"><span
                                    class="lbl-hot">
                                    @if ($location->status === 'featured')
                                        Phổ biến
                                    @else
                                        {{ $location->status }}
                                    @endif
                                </span></div>
                        </a>
                        <div class="informations">
                            <a href="{{ route('companies.index', ['district' => $location->district_id]) }}">
                                <h5>{{ $location->district?->name }}, {{ $location->city?->name }},
                                    {{ $location->country?->name }}</h5>
                            </a>
                             {{-- <div class="{{ $location->country_id }}">
                                    <span
                                        class="text-14 color-text-paragraph-2">{{ $location->country?->companies?->count() }}
                                        Doanh nghiệp</span>
                                </div> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
