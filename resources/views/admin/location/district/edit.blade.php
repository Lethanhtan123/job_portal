@extends('admin.layouts.master')
@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Quân huyện</h1>
    </div>
    <div class="section-body">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Cập nhật quận huyện</h4>
                </div>
                <div class=" card-body">
                    <form action="{{ route('admin.district.update',$District->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Thành phố</label>

                                    <select name="city" id=""
                                        class="select2 form-control city {{ hasError($errors, 'city') }}">
                                        @foreach ($City as $item)
                                        <option @selected($item->id===$District->city_id) value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tên quận huyện</label>
                                    <input type="text" name="district" class="form-control {{ hasError($errors, 'district') }}"
                                        id="" value="{{ old('district',$District->name) }}">
                                    <x-input-error :messages="$errors->get('district')" class="mt-2" />

                                </div>
                            </div>
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
