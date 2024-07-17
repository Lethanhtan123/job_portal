<section class="mt-20 section-box futured_jobs">
    <div class="container">
        <div class="text-center">
            <h2 class="mb-10 section-title wow animate__animated animate__fadeInUp">Công việc nổi bật</h2>
            <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Tương lai sẽ tốt đẹp hơn
                với sự đồng hành của chúng tôi</p>
            <div class="mt-40 list-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    @foreach ($featuredCategories as $category)
                    <li><a class="nav_tab_job
                                        {{ $loop->index === 0 ? 'active' : '' }}

                            " id="nav-tab-job-{{ $category->id }}" href="#tab-job-{{ $category->id }}"
                            data-bs-toggle="tab" role="tab" aria-controls="tab-job-{{ $category->id }}"
                            aria-selected="true">{{ $category->name }} ({{ $category->jobs_count }})</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="mt-40">
            <div class="tab-content" id="myTabContent-1">
                @foreach ($featuredCategories as $category)
                <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : '' }}"
                    id="tab-job-{{ $category->id }}" role="tabpanel" aria-labelledby="tab-job-{{ $category->id }}">
                    <div class="row">
                        @php
                        $featuredJobs = $category
                        ->jobs()
                        ->where('featured', 1)
                        ->where(['status' => 'active'])
                        ->where('deadline', '>=', date('Y-m-d'))
                        ->latest()
                        ->take(8) ->get();
                        @endphp

                        @if ($featuredJobs->isNotEmpty())
                        @foreach ($featuredJobs as $job)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="card-grid-2 card-job-hot hover-up">


                                                    @if ($job->featured)
                                                        <a class="mr-5 btn btn-grey-small highlight" href="javascript:;">Nổi
                                                            bật</a>
                                                    @endif


                                <div class="mt-2 card-grid-2-image-left"><span class="flash"></span>
                                    <div class="image-box"><img src="{{ asset($job->company?->logo) }}" alt="joblist">
                                    </div>

                                </div>
                                <div class="card-block-info">
                                    <h6><a class="minheight78 text-split me-0" href="{{ route('jobs.show', $job->slug) }}">{{
                                            $job->title }}</a>
                                    </h6>
                                    <div class="mt-5 mb-2"><span class="card-briefcase">{{ $job->jobType->name
                                            }}</span><span class="card-time"><span>{{ $job->created_at->diffForHumans()
                                                }}</span></span>
                                    </div>
                                    <p>{{ Str::limit(strip_tags($job->description), 100, '...') }}</p>
                                    <div class="mt-30">
                                        @foreach ($job->skills as $jobSkill)
                                        @if ($loop->index <= 3) <a class="mr-5 btn btn-grey-small " href="javascript:;">
                                            {{ $jobSkill->skill->name }}</a>
                                            @elseif ($loop->index == 7)
                                            <a class="mr-5 btn btn-grey-small " href="javascript:;">More..</a>
                                            @endif
                                            @endforeach
                                    </div>
                                </div>
                                @if ($job->salary_mode === 'range')

                                <span class="card-text-price">{{ $job->min_salary }} - {{ $job->max_salary }} {{
                                    $job->tygia }}/VNĐ</span>
                                @else
                                <span class="card-text-price">{{ $job->custom_salary }}</span>
                                @endif
                                <a href="{{ route('jobs.show', $job->slug) }}">
                                    <div class="btn btn-apply-now">
                                        Xem chi tiết</div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <h5 class="mt-3 text-center">Tiếc quá không tìm thấy dữ liệu! 😥</h5>
                        @endif


                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
