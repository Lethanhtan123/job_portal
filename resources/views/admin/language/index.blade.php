@extends('admin.layouts.master')
@section('contents')
    <section class="section">
        <div class="section-header">
            <a href="{{ route('admin.languages.index') }}">
                <h1>Ngôn ngữ</h1>
            </a>
        </div>
        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Danh sách ngôn ngữ</h4>
                        <div class="card-header-form">
                            <form action="{{ route('admin.languages.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm" name="search">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <a href="{{ route('admin.languages.create') }}" class="ml-2 btn btn-primary">Tạo mới</a>
                    </div>
                    <div class="p-0 card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Tên</th>
                                    <th>Đường dẫn</th>
                                    <th style="width: 20%">Chức năng</th>
                                </tr>

                                <tbody>
                                    @forelse ($languages as $lang)
                                        <tr>
                                            <th>{{ $lang->name }}</th>
                                            <th>{{ $lang->slug }}</th>
                                            <th>
                                                <a href="{{ route('admin.languages.edit', $lang->id) }}"
                                                    class="btn btn-sm btn-primary">Cập nhật</a>
                                                <a href="{{ route('admin.languages.destroy', $lang->id) }}"
                                                    class="btn btn-sm btn-danger delete-item">Xóa</a>
                                            </th>
                                        </tr>
                                        @empty
                                        <tr>
                                        <td colspan="3" class="text-center" > No result found!</td>
                                        </tr>
                                    @endforelse
                                </tbody>


                            </table>
                        </div>
                        <div class="text-right card-footer">
                            {{-- <nav class="d-inline-block">
                            <ul class="mb-0 pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1"><i
                                            class="fas fa-chevron-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1 <span
                                            class="sr-only">(current)</span></a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav> --}}
                            @if ($languages->hasPages())
                                {{ $languages->withQueryString()->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
