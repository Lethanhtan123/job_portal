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
                            <li>Tin tuyển dụng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                @include('fontend.company-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-2">Danh sách tin tuyển dụng</h4>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="card-header-form">
                                        <form action="{{ route('company.jobs.index') }}" method="GET">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Tìm kiếm"
                                                    name="search" value="{{ request('search') }}">
                                                <div class="input-group-btn">
                                                    <button type="submit" style="height: 50px;" class="font-bold btn btn-apply font-md"><i
                                                            class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="text-center col-md-3">
                                    <a href="{{ route('company.jobs.create') }}" class="font-bold btn btn-apply font-md"> <i
                                            class="fas fa-plus-circle me-2"></i>Tạo mới</a>
                                </div>
                            </div>
                        </div>
                        <div class="p-0 card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 270px">Tiêu đề</th>
                                            <th>Loại ngành/Chức vụ</th>
                                            <th>Đã ứng tuyển</th>

                                            <th>Hạn cuối đăng ký</th>
                                            <th>Trạng thái</th>
                                            <th style="width: 10%">Thao tác</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($jobs as $job)
                                            <tr>
                                                <td>
                                                    <div class="d-flex">

                                                        <div>
                                                            <b>{{ $job->title }}</b>
                                                            <br>
                                                            <span>{{ $job->company->name }} -
                                                                {{ $job->jobType->name }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <b>{{ $job->category?->name }}</b>
                                                        <br>
                                                        <span>{{ $job->jobRole->name }}</span>
                                                    </div>
                                                </td>

                                                <td>
                                                    {{ $job->applications_count }}
                                                </td>

                                                <td>{{ formatDate($job->deadline) }}</td>
                                                <td>
                                                    @if ($job->status === 'pending')
                                                        <span class="badge bg-warning">Đang chờ duyệt</span>
                                                    @elseif ($job->deadline > date('Y-m-d'))
                                                        <span class="badge bg-success ">Đang tuyển</span>
                                                    @else
                                                        <span class="badge bg-danger ">Đã hết hạn</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="fas fa-cogs"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                            <li><a class="dropdown-item" href="{{ route('company.job.applications', $job->id) }}">Ứng viên</a></li>
                                                            <li><a class="dropdown-item" href="{{ route('company.jobs.edit', $job->id) }}">Cập nhật</a>
                                                            </li>
                                                            <li><a class="dropdown-item delete-item" href="{{ route('company.jobs.destroy', $job->id) }}">Xóa</a></li>
                                                        </ul>
                                                    </div>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="12" class="text-center">Chưa có bài viết!</td>
                                            </tr>
                                        @endforelse

                                    </tbody>

                                </table>
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
                </div>
            </div>
        </div>
    </section>
@endsection
