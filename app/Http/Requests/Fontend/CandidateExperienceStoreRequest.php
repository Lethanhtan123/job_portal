<?php

namespace App\Http\Requests\Fontend;

use Illuminate\Foundation\Http\FormRequest;

class CandidateExperienceStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company' => ['required','max:255'],
            'department' => ['required','max:255'],
            'designation' => ['required','max:255'],
            'responsibilities' => ['required','max:500'],
            'start' => ['required','date'],
            'end' => ['required', 'date'],
            'currently_working' => ['nullable'],
        ];
    }
}