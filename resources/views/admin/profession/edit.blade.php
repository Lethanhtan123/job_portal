@extends('admin.layouts.master')
@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Công việc</h1>
    </div>
    <div class="section-body">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Cập nhật công việc</h4>
                </div>
                <div class=" card-body">
                  <form action="{{ route('admin.professions.update',$profession->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" name="name"
                        class="form-control {{ hasError($errors, 'name') }}" id=""
                        value="{{ old('name',$profession->name) }}"
                        >
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
