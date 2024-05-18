@extends('admin.layouts.master')
@section('contents')
    <section class="section">
        <div class="section-header">
            <a href="{{ route('admin.job-experiences.index') }}">
                <h1>Job Experiences</h1>
            </a>
        </div>
        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Job Experiences</h4>
                        <div class="card-header-form">
                            <form action="{{ route('admin.job-experiences.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="search">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <a href="{{ route('admin.job-experiences.create') }}" class="ml-2 btn btn-primary">Create new</a>
                    </div>
                    <div class="p-0 card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th style="width: 20%">Action</th>
                                </tr>

                                <tbody>
                                    @forelse ($Jobexperience as $item)
                                        <tr>
                                            <th>{{ $item->name }}</th>
                                            <th>{{ $item->slug }}</th>
                                            <th>
                                                <a href="{{ route('admin.job-experiences.edit', $item->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <a href="{{ route('admin.job-experiences.destroy', $item->id) }}"
                                                    class="btn btn-sm btn-danger delete-item">Delete</a>
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

                            @if ($Jobexperience->hasPages())
                                {{ $Jobexperience->withQueryString()->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
