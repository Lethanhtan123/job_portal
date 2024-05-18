@extends('admin.layouts.master')
@section('contents')
<section class="section">
    <div class="section-header">
        <a href="{{ route('admin.jobs.index') }}">
            <h1>Job Post</h1>
        </a>
    </div>
    <div class="section-body">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Job post</h4>
                    <div class="card-header-form">
                        <form action="{{ route('admin.jobs.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="search">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <a href="{{ route('admin.jobs.create') }}" class="ml-2 btn btn-primary">Create new</a>
                </div>
                <div class="p-0 card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Job</th>
                                <th>Category/Role</th>
                                <th>Salary</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th style="width: 20%">Action</th>
                            </tr>

                            <tbody>
                                @forelse ($jobs as $job)
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="mr-2">
                                                <img style="width:50px;height:50px;object-fit:cover"
                                                    src="{{ asset($job->company->logo) }}" alt="">
                                            </div>
                                            <div>
                                                <b>{{ $job->title }}</b>
                                                <br>
                                                <span>{{ $job->company->name }} - {{ $job->jobType->name }}</span>
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
                                        @if ($job->salary_mode === 'range')
                                        <b>{{ $job->min_salary }} - {{ $job->max_salary }} {{
                                            config('settings.site_default_currency') }}</b>
                                        <br>
                                        <span>{{ $job->salaryType->name }}</span>
                                        @else
                                        <b>{{ $job->custom_salary }}</b>
                                        <br>
                                        <span>{{ $job->salaryType->name }}</span>

                                        @endif
                                    </td>
                                    <td>{{ formatDate($job->deadline) }}</td>
                                    <td>
                                        @if ($job->status === 'pending')
                                        <span class="badge bg-warning text-dark">Peinding</span>
                                        @elseif($job->deadline > date('Y-m-d'))
                                        <span class="badge bg-primary text-dark">Active</span>
                                        @else
                                        <span class="badge bg-danger text-dark">Expired</span>
                                        @endif
                                    </td>
                                    {{-- <td>
                                        <div class="form-group">
                                            <label class="mt-2 custom-switch">
                                                <input @checked($job->status === 'active') type="checkbox" data-id="{{
                                                $job->id }}" name="custom-switch-checkbox" class="custom-switch-input post_status">
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                    </td> --}}
                                    <td>
                                        <a href="{{ route('admin.jobs.edit', $job->id) }}"
                                            class="btn-sm btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.jobs.destroy', $job->id) }}"
                                            class="btn-sm btn btn-danger delete-item"><i
                                                class="fas fa-trash-alt"></i></a>
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
                    <div class="text-right card-footer">

                        {{-- @if ($Salarytype->hasPages())
                        {{ $Salarytype->withQueryString()->links() }}
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

