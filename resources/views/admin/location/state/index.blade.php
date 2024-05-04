@extends('admin.layouts.master')
@section('contents')
<section class="section">
    <div class="section-header">
        <a href="{{ route('admin.state.index') }}"><h1>All State</h1></a>

    </div>
    <div class="section-body">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Advanced Table</h4>
                    <div class="card-header-form">
                        <form action="{{ route('admin.state.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="search">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <a href="{{ route('admin.state.create') }}" class="ml-2 btn btn-primary">Create new</a>
                </div>
                <div class="p-0 card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Country</th>
                                <th style="width: 20%">Action</th>
                            </tr>

                            <tbody>
                                @forelse ($State as $type)
                                <tr>
                                    <th>{{ $type->name }}</th>
                                    <th>{{ $type->country?->name }}</th>
                                    <th>
                                        <a href="{{ route('admin.state.edit',$type->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('admin.state.destroy',$type->id) }}" class="btn btn-sm btn-danger delete-item">Delete</a>
                                    </th>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">Không tìm thấy kết quả</td>
                                </tr>
                                @endforelse
                            </tbody>


                        </table>
                    </div>
                    <div class="text-right card-footer">
                        @if ($State->hasPages())
                            {{ $Country->withQueryString()->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
