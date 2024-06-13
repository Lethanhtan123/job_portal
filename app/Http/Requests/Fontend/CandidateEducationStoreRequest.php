<?php

namespace App\Http\Requests\Fontend;

use Illuminate\Foundation\Http\FormRequest;

class CandidateEducationStoreRequest extends FormRequest
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
            'level' => ['required', 'max:255'],
            'degree' => ['required', 'max:255'],
            'year' => ['required', 'integer'],
            'note' => ['nullable', 'max:500'],

        ];
    }
}
