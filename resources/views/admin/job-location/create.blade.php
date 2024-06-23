@extends('admin.layouts.master')

@section('contents')
<section class="section">
    <div class="section-header">
        <a href="{{ route('admin.job-location.index') }}"><h1>Nơi tuyển dụng</h1></a>
    </div>

    <div class="section-body">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tạo mới nơi tuyển dụng</h4>

                </div>
                <div class="card-body">
                    <form action="{{ route('admin.job-location.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control {{ hasError($errors, 'image') }}"
                                        name="image">
                                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                </div>
                            </div>


                        </div>


                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Quốc gia</label>
                                <select name="country" id=""
                                    class="form-control select2 {{ hasError($errors, 'country') }}">
                                    <option value="">Chọn</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>

                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('country')" class="mt-2" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Thành phố</label>
                                <select name="city" id="" class="form-control select2 {{ hasError($errors, 'city') }}">
                                    <option value="">Chọn</option>
                                    @foreach ($cities as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>

                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('city')" class="mt-2" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Quận,huyện</label>
                                <select name="district" id=""
                                    class="form-control select2 {{ hasError($errors, 'district') }}">
                                    <option value="">Chọn</option>
                                    @foreach ($districts as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>

                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('district')" class="mt-2" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Trạng thái</label>
                                <select name="status" id="" class="form-control {{ hasError($errors, 'status') }}">
                                    <option value="">Chọn</option>
                                    <option value="featured">Nổi bật</option>
                                    <option value="hot">Hot</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Tạo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@push('scripts')
<script>
    $(document).ready(function() {
        $('.country').on('change', function() {
            let country_id = $(this).val();

            $.ajax({
                mehtod: 'GET',
                url: '{{ route("admin.get-cities", ":id") }}'.replace(":id", country_id),
                data: {},
                success: function(response) {
                    let html = '';

                    $.each(response, function(index, value) {
                        html += `<option value="${value.id}" >${value.name}</option>`
                    });

                    $('.city').html(html);

                },
                error: function(xhr, status, error) {

                }
            })
        })
    });

    $(document).ready(function() {
        $('.city').on('change', function() {
            let city_id = $(this).val();

            $.ajax({
                mehtod: 'GET',
                url: '{{ route("admin.get-districts", ":id") }}'.replace(":id", city_id),
                data: {},
                success: function(response) {
                    let html = '';

                    $.each(response, function(index, value) {
                        html += `<option value="${value.id}" >${value.name}</option>`
                    });

                    $('.district').html(html);

                },
                error: function(xhr, status, error) {

                }
            })
        })
    });
</script>
@endpush
