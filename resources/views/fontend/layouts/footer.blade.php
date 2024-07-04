<footer class="footer">
    <div class="container">
      <div class=" justify-content-center">
        @php
        $footerDetails = \App\Models\Footer::first();
        $footerIcons = \App\Models\SocialIcon::all();

    @endphp
        <div class="row_footer">
            <a class="footer_logo" href="index.html">
                <img alt="joblist" src="{{ $footerDetails?->logo }}">
            </a>
            <div class="mt-20 mb-20 footer_desc font-xs color-text-paragraph-2">{{ $footerDetails?->details }}</div>
            <div class="footer-social">
                @foreach ($footerIcons as $icon)
                <a class="icon-socials icon-facebook" href="{{ $icon->url }}"><i class="{{ $icon->icon }}"></i></a>
                @endforeach

            </div>
        </div>
      </div>
      <div class="footer-bottom mt-50">
        <div class="row">
            <div class="col-md-6"><span class="font-xs color-text-paragraph">&copy; Copyright 2024 {{ $footerDetails?->copyright }}. All rights reserved.</span></div>
        </div>
    </div>
    </div>
  </footer>
