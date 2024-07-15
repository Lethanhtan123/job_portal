<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <form action=" {{ route('candidate.profile.basic-info.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="mb-2 box-avt">
                    <x-image-preview :height="200" :width="200" :source="$candidate?->image" />
                </div>
                <div class="btm-box-avt mb-3">
                    <div class="form-group">
                        <label class="mb-10 font-md text-capitalize color-text-mutted">Ảnh đại diện *
                        </label>
                        <input class="form-control  {{ $errors->has('profile_picture') ? 'is-invalid' : '' }} "
                            type="file" value="" name="profile_picture">
                        <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                    </div>
                </div>


                <div class="btm-box-avt">
                    <div class="form-group">
                        <label class="mb-10 font-md text-capitalize color-text-mutted">CV <span class="text-success">{{ $candidate?->cv ? '(Bạn đã đính kèm 1 CV)' : '' }}</span>
                        </label>
                        <input class="form-control  {{ $errors->has('cv') ? 'is-invalid' : '' }} " type="file"
                            value="" name="cv">
                        <x-input-error :messages="$errors->get('cv')" class="mt-2" />
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="mb-10 font-md text-capitalize color-text-mutted">Họ tên *
                            </label>
                            <input class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }} "
                                type="text" value="{{ $candidate?->full_name }}" name="full_name">
                            <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="mb-10 font-md text-capitalize color-text-mutted">Tiêu đề
                            </label>
                            <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }} " type="text"
                                value="{{ $candidate?->title }}" name="title">
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group select-style">
                            <label class="mb-10 font-md text-capitalize color-text-mutted">Kinh nghiệm *</label>
                            <select name="experience_level" id=""  class="{{ $errors->has('experience_level') ? 'is-invalid' : '' }} form-control form-icons select-active">
                                <option value=""> Chọn </option>
                                @foreach ($experiences as $exp)
                                    <option @selected($exp->id === $candidate?->experience_id) value="{{ $exp->id }}"> {{ $exp->name }} </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('experience_level')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="mb-10 font-md text-capitalize color-text-mutted">Website
                            </label>
                            <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }} "
                                type="text" value="{{ $candidate?->website }}" name="website">
                            <x-input-error :messages="$errors->get('website')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="mb-10 font-md text-capitalize color-text-mutted">Ngày sinh *</label>
                            <input id="inputdate"
                                class="form-control  {{ $errors->has('birth_date') ? 'is-invalid' : '' }}"
                                name="birth_date" type="date" value="{{ $candidate?->birth_date }}">
                            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="box-button mt-15">
            <button class="font-bold btn btn-apply-big font-md">Lưu thay đổi</button>
        </div>
    </form>
</div>
