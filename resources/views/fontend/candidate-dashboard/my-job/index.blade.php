@extends('fontend.layouts.master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Trang cá nhân</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('home') }}">Trang chủ</a></li>
                            <li>Công việc đã ứng tuyển</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                @include('fontend.candidate-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <div class="w-my-job">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>Công việc đã ứng tuyển</h4>
                        </div>
                        <table class="table table-striped mt-15">
                            <thead>
                                <tr>
                                    <th>Công ty</th>
                                    <th>Lương</th>
                                    <th>Thời gian</th>
                                    <th>Tình trạng</th>
                                    <th class="">Thao tác</th>
                                </tr>
                            </thead>

                            <tbody class="experience-tbody">
                                @forelse ($appliedJobs as $item)
                                    <tr>

                                        <td class="align-middle" >
                                            <div class="d-flex align-items-center">
                                                <a class="d-block">
                                                    <img style="width:50px;height:50px;object-fit:cover;"
                                                        src="{{ asset($item->job->company->logo) }}"
                                                        title="{{ $item->job->company->name }}"
                                                        alt="{{ $item->job->company->name }}">
                                                </a>
                                                <p class="mb-0 ms-2 w-r-content">
                                                    <a class="d-block font-md">
                                                        {{ $item->job->title }}
                                                    </a>
                                                    <span
                                                        class="d-block com-lc font-sm">{{ $item->job?->company?->companyCountry->name }}</span>
                                                </p>
                                            </div>
                                        </td>


                                        <td class="align-middle" >
                                            <p class="mb-0">
                                                @if ($item->job->salary_mode === 'range')
                                                    {{ $item->job->min_salary }} -
                                                    {{ $item->job->max_salary }}/{{ $item->job->tygia }}VNĐ
                                                    {{ config('settings.site_default_currency') }}
                                                @else
                                                    {{ $item->job->custom_salary }}
                                                @endif
                                            </p>
                                        </td>
                                        <td class="align-middle" >{{ formatDate($item->created_at) }}</td>
                                        <td class="align-middle" >
                                            @if ($item->job->deadline < date('Y-m-d'))
                                                <span class="badge bg-danger ">Đã hết hạn</span>
                                            @else
                                                <span class="badge bg-success ">Hiện hành</span>
                                            @endif
                                        </td>

                                        <td class="align-middle" >
                                            <a href="{{ route('jobs.show', $item->job->slug) }}"
                                                class="btn btn-sm rounded btn-primary text-white"><i
                                                    class="fa fa-eye text-white"></i></a>



                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class=" text-center">Không tìm thấy dữ liệu</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
