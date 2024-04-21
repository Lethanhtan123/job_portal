@extends('fontend/layouts.master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Blog</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                @include('fontend.company-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">

                    <ul class="nav nav-pills nav-cus mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Company Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Founding Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Account Settings</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <form action=" {{ route('company.profile.company-info') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="box-avt mb-2">
                                            <x-image-preview :height="200" :width="200" :source="$companyInfo?->logo" />
                                        </div>
                                        <div class="btm-box-avt">
                                            <div class="form-group">
                                                <label class="font-sm text-capitalize color-text-mutted mb-10">Logo *
                                                </label>
                                                <input class="form-control  {{ $errors->has('logo') ? 'is-invalid' : '' }} "
                                                    type="file" value="" name="logo">
                                                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="font-sm text-capitalize color-text-mutted mb-10">Company name *
                                            </label>
                                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} "
                                                type="text" value="{{ $companyInfo?->name }}" name="name">
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm text-capitalize color-text-mutted mb-10">Company bio *
                                            </label>
                                            <textarea name="bio" class="  {{ $errors->has('bio') ? 'is-invalid' : '' }}  summernote">{{ $companyInfo?->bio }}</textarea>
                                            <x-input-error :messages="$errors->get('bio')" class="mt-2" />

                                        </div>
                                    </div>
                                </div>
                                <div class="box-button mt-15">
                                    <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <form action="{{ route('company.profile.founding-info') }}" method="POST"
                                enctype="mulipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm text-capitalize color-text-mutted mb-10">Website </label>
                                            <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}"
                                                type="text" name="website" value="{{ $companyInfo?->website }}">
                                            <x-input-error :messages="$errors->get('website')" class="mt-2" />

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm text-capitalize color-text-mutted mb-10">Establishment
                                                date</label>
                                            <input
                                                class="form-control datepicker  {{ $errors->has('establishment_date') ? 'is-invalid' : '' }}"
                                                name="establishment_date" type="text"
                                                value="{{ $companyInfo?->establishment_date }}">
                                            <x-input-error :messages="$errors->get('establishment_date')" class="mt-2" />

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm text-capitalize color-text-mutted mb-10">Email *</label>
                                            <input class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                name="email" type="email" value="{{ $companyInfo?->email }}">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm text-capitalize color-text-mutted mb-10">Phone *</label>
                                            <input class="form-control  {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                                name="phone" type="text" value="{{ $companyInfo?->phone }}">
                                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm text-capitalize color-text-mutted mb-10">Country
                                                *</label>
                                            <select name="country" id=""
                                                class=" form-control form-icons select-active  {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                                value="{{ $companyInfo?->country }}">
                                                <option value="">Select</option>
                                                <option value="0">country 1</option>
                                                <option value="1">country 2</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('country')" class="mt-2" />

                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="font-sm text-capitalize color-text-mutted mb-10">Address
                                                *</label>
                                            <input class="form-control  {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                                name="address" type="text" value="{{ $companyInfo?->address }}">
                                            <x-input-error :messages="$errors->get('address')" class="mt-2" />

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm text-capitalize color-text-mutted mb-10">Map link
                                            </label>
                                            <input class="form-control  " name="map_link" type="text"
                                                value="{{ $companyInfo?->map_link }}">


                                        </div>
                                    </div>
                                </div>
                                <div class="box-button mt-15">
                                    <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <form action="{{ route('company.profile.account-info') }}" method="POST"
                                enctype="mulipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group select-style">
                                            <label class="font-sm text-capitalize color-text-mutted mb-10">Username *
                                            </label>
                                            <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                                                value="{{ auth()->user()->name }}">
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm text-capitalize color-text-mutted mb-10">Email * </label>
                                            <input class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email"
                                                value="{{ auth()->user()->email }}">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="box-button w-25 mt-2 mb-4">
                                            <button class="btn btn-apply font-md font-bold">Save All Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form action="{{ route('company.profile.password-update') }}" method="POST"
                                enctype="mulipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm text-capitalize color-text-mutted mb-10">Password *
                                            </label>
                                            <input class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm text-capitalize color-text-mutted mb-10">Confirm Password * </label>
                                            <input class="form-control  {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password" name="password_confirmation">
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="box-button w-25 mt-2 mb-4">
                                            <button class="btn btn-apply font-md font-bold">Save All Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
