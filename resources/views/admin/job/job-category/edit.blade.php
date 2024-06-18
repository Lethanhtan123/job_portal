@extends('admin.layouts.master')
@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Loại nghành</h1>
    </div>
    <div class="section-body">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Cập nhật loại nghành </h4>
                </div>
                <div class=" card-body">
                  <form action="{{ route('admin.job-categories.update',$Category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Icon</label>
                      <div role="iconpicker" data-align="left" name="icon" class="{{ hasError($errors, 'icon') }}" data-icon="{{ $Category->icon }}"></div>
                        <x-input-error :messages="$errors->get('icon')" class="mt-2" />

                    </div>

                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" name="name" class="form-control {{ hasError($errors, 'name') }}" id=""
                            value="{{ old('name',$Category->name) }}">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label for="">Phổ biến</label>
                        <select name="show_at_popular"  class="form-control {{ hasError($errors, 'show_at_popular') }}" >
                            <option @selected($Category->show_at_popular === 0) value="0">Không</option>
                            <option @selected($Category->show_at_popular === 1) value="1">Có</option>
                        </select>
                        <x-input-error :messages="$errors->get('show_at_popular')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label for="">Nổi bật</label>
                        <select name="show_at_featured"  class="form-control {{ hasError($errors, 'show_at_featured') }}" >
                            <option @selected($Category->show_at_featured === 0) value="0">Không</option>
                            <option @selected($Category->show_at_featured === 1) value="1">Có</option>
                        </select>
                        <x-input-error :messages="$errors->get('show_at_featured')" class="mt-2" />
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
