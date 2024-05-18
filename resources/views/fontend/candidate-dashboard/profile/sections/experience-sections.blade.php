<div class="tab-pane fade" id="pills-experience" role="tabpanel" aria-labelledby="pills-experience-tab">
    <div class="d-flex justify-content-between align-items-center">
        <h4>Experience</h4>
        <div class="box-button">
            <button onlick="$('#ExperienceForm').trigger('reset'); editId=''; editMode=false;" class="font-bold btn btn-apply font-md " data-bs-toggle="modal" data-bs-target="#experienceModal">Add
                Experience</button>
        </div>
    </div>
    <table class="table table-striped mt-15">
        <thead>
            <tr>
                <th>Company</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Period</th>
                <th class="w-th-action ">Action</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                @foreach ($candidateExperiences as $canEx)
                    <td>{{ $canEx->company }}</td>
                    <td>{{ $canEx->department }}</td>
                    <td>{{ $canEx->designation }}</td>
                    <td>{{ $canEx->start }} - {{ $canEx->currently_working === 1 ? 'Current' : $canEx->end }}</td>

                    <td class="d-flex justify-content-between align-items-center flex-wrap">
                        <a href="{{ route("candidate.experience.edit",$canEx->id) }}" class="btn btn-sm rounded btn-primary edit-experience" data-bs-toggle="modal"
                            data-bs-target="#experienceModal">Edit</a>
                        <a href="{{ route("candidate.experience.destroy",$canEx->id) }}" class="delete-experience btn btn-sm btn-danger rounded delete-item">Delete</a>
                    </td>
                @endforeach
            </tr>

        </tbody>
    </table>
</div>
