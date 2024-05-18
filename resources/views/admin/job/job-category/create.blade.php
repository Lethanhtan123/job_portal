@extends('admin.layouts.master')
@section('contents')
<section class="section">
    <div class="section-header">
        <h1>All Job categories</h1>
    </div>
    <div class="section-body">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create new categories</h4>
                </div>
                <div class=" card-body">
                    <form action="{{ route('admin.job-categories.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Icon</label>
                          <div role="iconpicker" data-align="left" name="icon" class="{{ hasError($errors, 'icon') }}"></div>
                            <x-input-error :messages="$errors->get('icon')" class="mt-2" />

                        </div>

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control {{ hasError($errors, 'name') }}" id=""
                                value="{{ old('name') }}">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
