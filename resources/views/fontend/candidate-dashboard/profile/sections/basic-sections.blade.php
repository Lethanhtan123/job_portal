<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <form action=" {{ route('company.profile.company-info') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="mb-2 box-avt d-none">
                    {{-- <x-image-preview :height="200" :width="200" :source="" /> --}}
                </div>
                <div class="btm-box-avt">
                    <div class="form-group">
                        <label class="mb-10 font-sm text-capitalize color-text-mutted">Profile picture *
                        </label>
                        <input class="form-control  {{ $errors->has('profile_picture') ? 'is-invalid' : '' }} "
                            type="file" value="" name="profile_picture">
                        <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="mb-10 font-sm text-capitalize color-text-mutted">Fullname *
                            </label>
                            <input class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }} "
                                type="text" value="" name="full_name" required>
                            <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="mb-10 font-sm text-capitalize color-text-mutted">Title/Tagline
                            </label>
                            <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }} " type="text"
                                value="" name="title">
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="mb-10 font-sm text-capitalize color-text-mutted">Experience Level *
                            </label>
                            <input class="form-control {{ $errors->has('experience_level') ? 'is-invalid' : '' }} "
                                type="text" value="" name="experience_level" required>
                            <x-input-error :messages="$errors->get('experience_level')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="mb-10 font-sm text-capitalize color-text-mutted">Website
                            </label>
                            <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }} "
                                type="text" value="" name="website">
                            <x-input-error :messages="$errors->get('website')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="mb-10 font-sm text-capitalize color-text-mutted">Date of birth</label>
                            <input
                                class="form-control datepicker  {{ $errors->has('birth_date') ? 'is-invalid' : '' }}"
                                name="birth_date" type="text"  value="">
                            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="box-button mt-15">
            <button class="font-bold btn btn-apply-big font-md">Save All Changes</button>
        </div>
    </form>
</div>
