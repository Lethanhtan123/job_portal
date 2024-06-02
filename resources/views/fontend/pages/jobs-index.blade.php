@extends('fontend.layouts.master')

@section('contents')
<section class="section-box mt-75">
    <div class="breacrumb-cover">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <h2 class="mb-20">Job's</h2>
                    <ul class="breadcrumbs">
                        <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                        <li>Job's</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-box mt-120">
    <div class="container">
        <div class="flex-row-reverse row">
            <div class="float-right col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="content-page">

                    <div class="row display-list">
                        @forelse ($jobs as $job)
                        <div class="col-xl-12 col-md-4">
                            <div class="card-grid-2 hover-up"><span class="flash"></span>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="card-grid-2-image-left">
                                            <div class="image-box"><img src="{{ asset($job->company->logo) }}"
                                                    alt="joblist"></div>
                                            <div class="right-info"><a class="name-job"
                                                    href="{{ route('companies.show', $job->company->slug) }}">{{
                                                    $job->company->name }}</a>

                                                    <span class="location-small">{{
                                                   ($job->company->companyCountry->name) }}</span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                        <div class="pl-15 mb-15 mt-30">
                                            @if ($job->featured)
                                            <a class="mr-5 btn btn-grey-small featured" href="javascript:;">Featured</a>
                                            @endif
                                            @if ($job->highlight)
                                            <a class="mr-5 btn btn-grey-small highlight"
                                                href="javascript:;">Highlight</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block-info">
                                    <h4><a href="{{ route('jobs.show', $job->slug) }}">{{ $job->title }}</a></h4>
                                    <div class="mt-5">
                                        <span class="card-briefcase">{{ $job->jobType->name }}</span>
                                        {{-- <span class="card-briefcase">{{ $job->jobExperience?->name }}</span> --}}
                                        <span class="card-time"><span>{{ $job->created_at->diffForHumans()
                                                }}</span></span>
                                    </div>
                                    {{-- <p class="mt-10 font-sm color-text-paragraph">Lorem ipsum dolor sit amet,
                                        consectetur adipisicing
                                        elit. Recusandae architecto eveniet, dolor quo repellendus pariatur</p> --}}
                                    <div class="mb-15 mt-30">
                                        @foreach ($job->skills as $jobSkill)
                                        @if ($loop->index <= 6) <a class="mr-5 btn btn-grey-small job-skill"
                                            href="javascript:;">{{ $jobSkill->skill->name }}</a>
                                            @elseif ($loop->index == 7)
                                            <a class="mr-5 btn btn-grey-small job-skill" href="javascript:;">More..</a>
                                            @endif
                                            @endforeach
                                    </div>

                                    <div class="mt-20 card-2-bottom">
                                        <div class="row">
                                            {{-- @if ($job->salary_mode === 'range')
                                            <div class="col-lg-7 col-7"><span class="card-text-price">
                                                    {{ $job->min_salary }} - {{ $job->max_salary }} {{
                                                    config('settings.site_default_currency') }}
                                                </span><span class="text-muted"></span>
                                            </div>
                                            @else
                                            <div class="col-lg-7 col-7"><span class="card-text-price">
                                                    {{ $job->custom_salary }}
                                                </span><span class="text-muted"></span>
                                            </div>
                                            @endif
                                            @php
                                            $bookmarkedIds = \App\Models\JobBookmark::where('candidate_id',
                                            auth()?->user()?->candidateProfile?->id)->pluck('job_id')->toArray();

                                            @endphp --}}

                                            <div class="col-lg-5 col-5 text-end">
                                                <div class="btn bookmark-btn job-bookmark" data-id="{{ $job->id }}">

                                                    {{-- @if (in_array($job->id, $bookmarkedIds))
                                                    <i class="fas fa-bookmark"></i>
                                                    @else
                                                    <i class="far fa-bookmark"></i>
                                                    @endif --}}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <h5 class="text-center">Sorry No Data Found! 😥</h5>
                        @endforelse

                    </div>
                </div>

                <div class="paginations">
                    <ul class="pager">
                        @if ($jobs->hasPages())
                        {{ $jobs->withQueryString()->links() }}
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="sidebar-shadow none-shadow mb-30 cus_sidebar">
                    <div class="sidebar-filters">
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
                                        <input class="form-control min-value" type="hidden" name="min-value" value="">
                                    </div>
                                </div>
                                <div class="box-number-money">
                                    <div class="row mt-30">
                                        <div class="col-sm-6 col-6"><span class="font-sm color-brand-1">$0</span></div>
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
                                            <input type="checkbox"><span class="text-small">$40k - $60k</span><span
                                                class="checkmark"></span>
                                        </label><span class="number-item">75</span>
                                    </li>
                                    <li>
                                        <label class="cb-container">
                                            <input type="checkbox"><span class="text-small">$60k - $80k</span><span
                                                class="checkmark"></span>
                                        </label><span class="number-item">98</span>
                                    </li>
                                    <li>
                                        <label class="cb-container">
                                            <input type="checkbox"><span class="text-small">$80k - $100k</span><span
                                                class="checkmark"></span>
                                        </label><span class="number-item">14</span>
                                    </li>
                                    <li>
                                        <label class="cb-container">
                                            <input type="checkbox"><span class="text-small">$100k - $200k</span><span
                                                class="checkmark"></span>
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
                                            <input type="checkbox"><span class="text-small">Entry Level</span><span
                                                class="checkmark"></span>
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
                                            <input type="checkbox" checked="checked"><span class="text-small">Part
                                                Time</span><span class="checkmark"></span>
                                        </label><span class="number-item">64</span>
                                    </li>
                                    <li>
                                        <label class="cb-container">
                                            <input type="checkbox"><span class="text-small">Remote Jobs</span><span
                                                class="checkmark"></span>
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
        </div>
    </div>
</section>
@endsection

{{-- @push('scripts')
<script>
    $(document).ready(function() {
        $('.country').on('change', function() {
            let country_id = $(this).val();
            // remove all previous cities
            $('.city').html("");

            $.ajax({
                mehtod: 'GET',
                url: '{{ route("get-states", ":id") }}'.replace(":id", country_id),
                data: {},
                success: function(response) {
                    let html = '';

                    $.each(response, function(index, value) {
                        html += `<option value="${value.id}" >${value.name}</option>`
                    });

                    html = `<option value="" >Choose</option>` + html;

                    $('.state').html(html);
                },
                error: function(xhr, status, error) {}
            })
        })

        // get cities
        $('.state').on('change', function() {
            let state_id = $(this).val();

            $.ajax({
                mehtod: 'GET',
                url: '{{ route("get-cities", ":id") }}'.replace(":id", state_id),
                data: {},
                success: function(response) {
                    let html = '';

                    $.each(response, function(index, value) {
                        html += `<option value="${value.id}" >${value.name}</option>`
                    });

                    html = `<option value="" >Choose</option>` + html;

                    $('.city').html(html);
                },
                error: function(xhr, status, error) {}
            })
        })

        $('.job-bookmark').on('click', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            method: 'GET',
            url: '{{ route("job.bookmark", ":id") }}'.replace(":id", id),
            data: {},
            success: function(response) {
                //fas fa-bookmark
                $('.job-bookmark').each(function() {
                    let elementId = $(this).data('id');

                    if(elementId == response.id) {
                        $(this).find('i').addClass('fas fa-bookmark');
                    }
                })
                notyf.success(response.message)
            },
            error: function(xhr, status, error) {
                let erorrs = xhr.responseJSON.errors;
                $.each(erorrs, function(index, value) {
                    notyf.error(value[index]);
                });
            }
        })
    })
    })
</script>
@endpush --}}
