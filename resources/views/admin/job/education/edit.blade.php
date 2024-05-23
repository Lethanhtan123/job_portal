@extends('admin.layouts.master')
@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Education</h1>
    </div>
    <div class="section-body">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update education</h4>
                </div>
                <div class=" card-body">
                  <form action="{{ route('admin.educations.update',$Education->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name"
                        class="form-control {{ hasError($errors, 'name') }}" id=""
                        value="{{ old('name',$Education->name) }}"
                        >
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
