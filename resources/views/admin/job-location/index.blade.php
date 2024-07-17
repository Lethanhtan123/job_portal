@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <a href="{{ route('admin.job-location.index') }}"><h1>Nơi tuyển dụng</h1></a>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tất cả địa điểm ,vị trí</h4>
                        <div class="mr-2 card-header-form">
                            <form action="{{ route('admin.job-location.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm" name="search">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <a href="{{ route('admin.job-location.create') }}" class="ms-2 btn btn-primary"> <i class="fas fa-plus-circle"></i> Tạo mới</a>
                    </div>
                    <div class="p-0 card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr class="mb-2">
                                    <th>Ảnh</th>
                                    <th>Quốc gia</th>
                                    <th>Thành Phố</th>
                                    <th>Quận huyện</th>
                                    <th>Trạng thái</th>
                                    <th style="width: 15%">Chức năng</th>
                                </tr>
                            <tbody>
                                @forelse ($locations as $location)

                                    <tr class="">
                                        <td><img src="{{ asset($location->image) }}"  class="job_location_img"></td>
                                        <td>{{ $location->country->name }}</td>
                                        <td>{{ $location->city->name }}</td>
                                        <td>{{ $location->district?->name }}</td>
                                        <td>
                                            <span class="badge badge-primary">{{ $location->status === 'hot' ? 'HOT' : 'Nổi bật' }}</span>
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.job-location.edit', $location->id) }}" class="btn-sm btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.job-location.destroy', $location->id) }}" class="btn-sm btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Không tìm thấy kết quả!</td>
                                    </tr>
                                @endforelse

                            </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="text-right card-footer">
                        <nav class="d-inline-block">
                            @if ($locations->hasPages())
                                {{ $locations->withQueryString()->links() }}
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
