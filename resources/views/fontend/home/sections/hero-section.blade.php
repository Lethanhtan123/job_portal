<section class="section-box mt-100 mb-100 banner_section hero_section"
    style="background-image: url({{ asset($hero?->background_image) }})">
    <div class="container">
        <div class="banner-hero hero-1">
            <div class="banner-inner">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-12 d-none d-xl-block col-md-6">
                        <div class="mt-40 banner-imgs">
                            <div class="block-1"><img class="img-responsive" alt="joblist"
                                    src="{{ asset($hero?->image) }}"></div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-12">
                        <div class="block-banner">
                            <h1 class="heading-banner wow animate__animated animate__fadeInUp">{{ $hero?->title }}</h1>
                            <div class="mt-20 banner-description wow animate__animated animate__fadeInUp"
                                data-wow-delay=".1s">
                                {{ $hero?->sub_title }}
                            </div>
                            <div class="mt-40 form-find wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                                <form action="{{ route('jobs.index') }}" method="GET">
                                    <div class="box-industry">
                                        <select class="mr-10 form-input select-active input-industry" name="category">
                                            <option value="">Loại doanh nghiệp</option>
                                            @foreach ($jobCategories as $category)
                                            <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <select class="mr-10 form-input select-active" name="country">
                                        <option value="">Khu vực</option>
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>

                                        @endforeach
                                    </select>
                                    <input id="keyword" class="mr-10 form-input input-keysearch" type="text"
                                        name="search" placeholder="Your keyword... ">
                                    <button class="btn btn-default btn-find font-sm">Search</button>
                                </form>

                                {{-- <div>
                                    <div class="lang d-flex justify-content-start align-items-center" onclick="doGoogleLanguageTranslator('vi|en'); return false;">
                                        smansndjdjff
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    $(document).ready(function() {
        var placeholderText = ["Nhập từ khóa..."];
    $('#keyword').placeholderTypewriter({
    text: placeholderText
    });
})


function GoogleLanguageTranslatorInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'vi',
        autoDisplay: false
    }, 'google_language_translator');
}
</script>


@endpush
