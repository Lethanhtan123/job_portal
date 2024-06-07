@foreach ($candidateExperiences as $canEx)
    <tr>
        <td>{{ $canEx->company }}</td>
        <td>{{ $canEx->department }}</td>
        <td>{{ $canEx->designation }}</td>
        <td>{{ $canEx->start }} - {{ $canEx->currently_working === 1 ? 'Current' : $canEx->end }}</td>

        <td class="d-flex justify-content-between align-items-center flex-wrap">
            <a href="{{ route('candidate.experience.edit', $canEx->id) }}"
                class="btn btn-sm rounded btn-primary edit-experience" data-bs-toggle="modal"
                data-bs-target="#experienceModal"><i class="fa-regular fa-pen-to-square text-white"></i></a>
            <a href="{{ route('candidate.experience.destroy', $canEx->id) }}"
                class="delete-experience btn btn-sm btn-danger rounded delete-item"><i class="fa-solid fa-trash-can text-white"></i></a>
        </td>
    </tr>
@endforeach
