@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Tìm kiếm trang chủ</h1>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Cập nhật thông tin</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.hero.update', 1) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-5">
                                   <div class="form-group">
                                        <x-image-preview :height="200" :width="300" :source="$hero?->image" />
                                        <div class="mt-2"></div>
                                        <label for="">Ảnh đại diện</label>
                                        <input type="file" class="form-control {{ hasError($errors, 'image') }}" name="image">
                                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <x-image-preview :height="200" :width="300" :source="$hero?->background_image" />
                                            <div class="mt-2"></div>
                                        <label for="">Ảnh nền</label>
                                        <input type="file" class="form-control {{ hasError($errors, 'background_image') }}" name="background_image">
                                        <x-input-error :messages="$errors->get('background_image')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Tiều đề</label>
                                <input type="text" class="form-control {{ hasError($errors, 'title') }}" name="title" value="{{ old('title', $hero?->title) }}">
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <label for="">Tiều đề phụ</label>
                                <input type="text" class="form-control {{ hasError($errors, 'sub_title') }}" name="sub_title" value="{{ old('sub_title', $hero?->sub_title) }}">
                                <x-input-error :messages="$errors->get('sub_title')" class="mt-2" />
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
