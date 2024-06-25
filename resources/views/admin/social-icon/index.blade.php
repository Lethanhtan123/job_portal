@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Icon mạng xã hội</h1>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Danh sách mạng xã hội</h4>
                        <div class="card-header-form">

                        </div>
                        <a href="{{ route('admin.social-icon.create') }}" class="btn btn-primary"> <i class="fas fa-plus-circle"></i> Tạo mới</a>
                    </div>
                    <div class="p-0 card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Icon</th>
                                    <th>Url</th>
                                    <th style="width: 20%">Chức năng</th>
                                </tr>
                            <tbody>
                                @forelse ($icons as $icon)
                                    <tr>
                                        <td><i style="font-size: 40px" class="{{ $icon->icon }}"></i></td>
                                        <td>{{ $icon->url }}</td>
                                        <td>
                                            <a href="{{ route('admin.social-icon.edit', $icon->id) }}" class="btn-sm btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.social-icon.destroy', $icon->id) }}" class="btn-sm btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No result found!</td>
                                    </tr>
                                @endforelse

                            </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="text-right card-footer">
                        <nav class="d-inline-block">
                            {{-- @if ($icons->hasPages())
                                {{ $icons->withQueryString()->links() }}
                            @endif --}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
