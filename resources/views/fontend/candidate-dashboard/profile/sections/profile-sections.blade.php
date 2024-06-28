<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <form action=" {{ route('candidate.profile.profile-info.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group select-style">
                    <label class="mb-10 font-md text-capitalize color-text-mutted">Giới tính *
                    </label>
                    <select name="gender" id=""
                        class="{{ $errors->has('gender') ? 'is-invalid' : '' }} form-control form-icons select-active">
                        <option value=""> Chọn giới tính </option>
                        <option @selected($candidate?->gender === 'male') value="male">Nam</option>
                        <option @selected($candidate?->gender === 'female') value="female">Nữ</option>
                    </select>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group select-style">
                    <label class="mb-10 font-md text-capitalize color-text-mutted">Trình trạng hôn nhân *
                    </label>
                    <select name="marital_status" id=""
                        class="{{ $errors->has('marital_status') ? 'is-invalid' : '' }} form-control form-icons select-active">
                        <option value=""> Chọn tình trạng hôn nhân </option>
                        <option @selected($candidate?->marital_status === 'single') value="single">Độc thân</option>
                        <option @selected($candidate?->marital_status === 'married') value="married">Đã kết hôn</option>
                    </select>
                    <x-input-error :messages="$errors->get('marital_status')" class="mt-2" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group select-style">
                    <label class="mb-10 font-md text-capitalize color-text-mutted">Nghề nghiệp *</label>
                    <select name="profession" id=""
                        class="{{ $errors->has('profession') ? 'is-invalid' : '' }} form-control form-icons select-active">
                        <option value=""> Chọn nghề nghiệp </option>
                        @foreach ($professions as $profession)
                            <option @selected($profession->id === $candidate?->profession_id) value="{{ $profession->id }}"> {{ $profession->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('profession')" class="mt-2" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group select-style">
                    <label class="mb-10 font-md text-capitalize color-text-mutted">Tình trạng hiện tại</label>
                    <select name="availability" id=""
                        class="{{ $errors->has('availability') ? 'is-invalid' : '' }} form-control form-icons select-active">
                        <option value=""> Select one </option>
                        <option @selected($candidate?->status === 'available') value="available">Sẵn sàng nhận việc</option>
                        <option @selected($candidate?->status === 'not_available') value="not_available">Chưa sẵn sàng nhận việc</option>
                    </select>
                    <x-input-error :messages="$errors->get('availability')" class="mt-2" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group select-style">
                    <label class="mb-10 font-md text-capitalize color-text-mutted">Kỹ năng
                    </label>
                    <select multiple="" name="skill[]" id=""
                        class=" {{ $errors->has('skill') ? 'is-invalid' : '' }} select-height  form-icons select-active">
                        <option value="" readonly> Select one </option>

                        @foreach ($skills as $skill)
                            @php
                                $candidateSkills = $candidate?->skills->pluck('skill_id')->toArray() ?? [];
                            @endphp
                            <option @selected(in_array($skill->id, $candidateSkills)) value="{{ $skill->id }}">{{ $skill->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('skill')" class="mt-2" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group select-style">
                    <label class="mb-10 font-md text-capitalize color-text-mutted">Trình độ ngôn ngữ
                    </label>
                    <select multiple="" name="language_you_know[]" id=""
                        class=" {{ $errors->has('language_you_know') ? 'is-invalid' : '' }}  select-height form-icons select-active">
                        <option value=""> Select one </option>


                        @foreach ($languages as $lang)
                          @php
                                $candidateLanguages = $candidate?->languages->pluck('language_id')->toArray() ?? [];
                            @endphp
                            <option @selected(in_array($lang->id, $candidateLanguages)) value="{{ $lang->id }}">{{ $lang->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('language_you_know')" class="mt-2" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Tiểu sử *</label>
                    <textarea name="biography" id="editor" class="{{ hasError($errors, 'biography') }}">{!! $candidate?->bio !!}</textarea>
                    <x-input-error :messages="$errors->get('biography')" class="mt-2" />
                </div>
            </div>


        </div>

        <div class="box-button mt-15">
            <button class="font-bold btn btn-apply-big font-md">Lưu tất cả thay đổi</button>
        </div>
    </form>
</div>
