 @foreach ($candidateEducations as $canEdu)
     <tr>
         <td>{{ $canEdu->degree }}</td>
         <td>{{ $canEdu->level }}</td>
         <td>{{ $canEdu->year }}</td>

         <td class="d-flex justify-content-between align-items-center flex-wrap">
             <a href="{{ route('candidate.education.edit', $canEdu->id) }}"
                 class="btn btn-sm rounded btn-primary edit-education" data-bs-toggle="modal"
                 data-bs-target="#educationModal"><i class="fa-regular fa-pen-to-square text-white"></i></a>
             <a href="{{ route('candidate.education.destroy', $canEdu->id) }}"
                 class="delete-education btn btn-sm btn-danger rounded delete-item"><i
                     class="fa-solid fa-trash-can text-white"></i></a>
         </td>
     </tr>
 @endforeach
