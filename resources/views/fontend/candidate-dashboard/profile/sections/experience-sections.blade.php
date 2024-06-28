<div class="tab-pane fade" id="pills-experience" role="tabpanel" aria-labelledby="pills-experience-tab">
    <div class="w-experience">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Kinh nghiệm</h4>
            <div class="box-button">
                <button onclick="$('#experience-form').trigger('reset'); editId=''; editMode=false;"
                    class="font-bold btn btn-apply font-md " data-bs-toggle="modal" data-bs-target="#experienceModal">Thêm
                    mới</button>
            </div>
        </div>
        <table class="table table-striped mt-15">
            <thead>
                <tr>
                    <th>Công ty</th>
                    <th>Phòng</th>
                    <th>Chức vụ</th>
                    <th>Giai đoạn</th>
                    <th class="w-th-action ">Thao tác</th>
                </tr>
            </thead>

            <tbody class="experience-tbody">
                @forelse ($candidateExperiences as $canEx)
                    <tr>
                        <td>{{ $canEx->company }}</td>
                        <td>{{ $canEx->department }}</td>
                        <td>{{ $canEx->designation }}</td>
                        <td>{{ $canEx->start }} - {{ $canEx->currently_working === 1 ? 'Hiện tại' : $canEx->end }}</td>

                        <td class="d-flex justify-content-between align-items-center flex-wrap">
                            <a href="{{ route('candidate.experience.edit', $canEx->id) }}"
                                class="btn btn-sm rounded btn-primary edit-experience text-white" data-bs-toggle="modal"
                                data-bs-target="#experienceModal"><i
                                    class="fa-regular fa-pen-to-square text-white"></i></a>
                            <a href="{{ route('candidate.experience.destroy', $canEx->id) }}"
                                class="delete-experience btn btn-sm btn-danger rounded delete-item text-white"><i
                                    class="fa-solid fa-trash-can text-white"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class=" text-center">Không tìm thấy dữ liệu</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    <div class="w-education">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Bằng cấp</h4>
            <div class="box-button">
                <button onclick="$('#education-form').trigger('reset'); editId=''; editMode=false;"
                    class="font-bold btn btn-apply font-md " data-bs-toggle="modal"
                    data-bs-target="#educationModal">Thêm mới</button>
            </div>
        </div>
        <table class="table table-striped mt-15">
            <thead>
                <tr>
                    <th>Bằng cấp</th>
                    <th>Bậc</th>
                    <th>Năm hoàn thành</th>
                    <th class="w-th-action ">Thao tác</th>
                </tr>
            </thead>

            <tbody class="education-tbody">
                @forelse ($candidateEducations as $canEdu)
                    <tr>
                        <td>{{ $canEdu->degree }}</td>
                        <td>{{ $canEdu->level }}</td>
                        <td>{{ $canEdu->year }}</td>

                        <td class="d-flex justify-content-between align-items-center flex-wrap">
                            <a href="{{ route('candidate.education.edit', $canEdu->id) }}"
                                class="btn btn-sm rounded btn-primary edit-education text-white" data-bs-toggle="modal"
                                data-bs-target="#educationModal"><i
                                    class="fa-regular fa-pen-to-square text-white"></i></a>
                            <a href="{{ route('candidate.education.destroy', $canEdu->id) }}"
                                class="delete-education btn btn-sm btn-danger rounded delete-item text-white"><i
                                    class="fa-solid fa-trash-can text-white"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class=" text-center">Không tìm thấy dữ liệu</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>
