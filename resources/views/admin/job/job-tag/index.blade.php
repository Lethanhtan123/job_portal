@extends('admin.layouts.master')
@section('contents')
    <section class="section">
        <div class="section-header">
            <a href="{{ route('admin.job-tags.index') }}">
                <h1>Tags (tuyển dụng)</h1>
            </a>
        </div>
        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Danh sách tags (tuyển dụng)</h4>
                        <div class="card-header-form">
                            <form action="{{ route('admin.job-tags.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm" name="search">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <a href="{{ route('admin.job-tags.create') }}" class="ml-2 btn btn-primary">Tạo mới</a>
                    </div>
                    <div class="p-0 card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Tên </th>
                                    <th>Đường dẫn</th>
                                    <th style="width: 20%">Chức năng</th>
                                </tr>

                                <tbody>
                                    @forelse ($Jobtag as $item)
                                        <tr>
                                            <th>{{ $item->name }}</th>
                                            <th>{{ $item->slug }}</th>
                                            <th>
                                                <a href="{{ route('admin.job-tags.edit', $item->id) }}"
                                                    class="btn btn-sm btn-primary">Cập nhật</a>
                                                <a href="{{ route('admin.job-tags.destroy', $item->id) }}"
                                                    class="btn btn-sm btn-danger delete-item">Xóa</a>
                                            </th>
                                        </tr>
                                        @empty
                                        <tr>
                                        <td colspan="3" class="text-center" > Không tìm thấy kết quả!</td>
                                        </tr>
                                    @endforelse
                                </tbody>


                            </table>
                        </div>
                        <div class="text-right card-footer">

                            @if ($Jobtag->hasPages())
                                {{ $Jobtag->withQueryString()->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
