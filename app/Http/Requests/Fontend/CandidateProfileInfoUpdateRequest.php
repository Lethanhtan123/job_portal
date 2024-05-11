<?php

namespace App\Http\Requests\Fontend;

use Illuminate\Foundation\Http\FormRequest;

class CandidateProfileInfoUpdateRequest extends FormRequest
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
            'gender' => ['required','in:male,female'],
            'marital_status' => ['required','in:married,single'],
            'profession' => ['required','integer'],
            'availability' => ['required','in:available,not_available'],
            'skill' => ['required'],
            'language_you_know' => ['required'],
            'biography' => ['required']
        ];
    }
}
