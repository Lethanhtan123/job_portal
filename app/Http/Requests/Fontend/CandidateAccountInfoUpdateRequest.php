<?php

namespace App\Http\Requests\Fontend;

use Illuminate\Foundation\Http\FormRequest;

class CandidateAccountInfoUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'country' => ['required','integer'],
            'city' => ['nullable', 'integer'],
            'district' => ['nullable', 'integer'],
            'address' => ['nullable', 'string'],
            'phone_one' => ['nullable', 'string'],
            'phone_two' => ['nullable', 'string'],
            'email' => ['nullable', 'email'],

        ];
    }
}
