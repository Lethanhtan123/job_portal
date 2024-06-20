@extends('fontend.layouts.master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Trang cá nhân</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Trang chủ</a></li>
                            <li>Trang cá nhân</li>
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
                                    <th class="w-th-action ">Thao tác</th>
                                </tr>
                            </thead>

                            <tbody class="experience-tbody">
                                @forelse ($appliedJobs as $item)
                                    <tr>

                                        <td>
                                            <div class="d-flex align-items-center flex-wrap">
                                                <a href="{{ $item->job->company->slug }}" class="d-block">
                                                    <img style="width:50px;height:50px;object-fit:cover;"
                                                        src="{{ asset($item->job->company->logo) }}"
                                                        title="{{ $item->job->company->name }}"
                                                        alt="{{ $item->job->company->name }}">
                                                </a>
                                                <p class="mb-0 ms-2">
                                                    <a href="{{ $item->job->company->slug }}" class="d-block font-md">
                                                        {{ $item->job->company->name }}
                                                    </a>
                                                    <span
                                                        class="d-block com-lc font-sm">{{ $item->job?->company?->companyCountry->name }}</span>
                                                </p>
                                            </div>
                                        </td>


                                        <td>{{ $item->department }}</td>
                                        <td>{{ $item->designation }}</td>
                                        <td>{{ $item->start }} -
                                            {{ $item->currently_working === 1 ? 'Current' : $item->end }}</td>

                                        <td class="d-flex justify-content-between align-items-center flex-wrap">
                                            <a href="{{ route('candidate.experience.edit', $item->id) }}"
                                                class="btn btn-sm rounded btn-primary edit-experience text-white"
                                                data-bs-toggle="modal" data-bs-target="#experienceModal"><i
                                                    class="fa-regular fa-pen-to-square text-white"></i></a>

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
