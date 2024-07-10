<?php

namespace App\Http\Requests\Fontend;

use Illuminate\Foundation\Http\FormRequest;

class CompanyFoundingInfoUpdateRequest extends FormRequest
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
            'industry_type_id' => ['required', 'integer'],
            'establishment_date' => ['required', 'date'],
            'website' => ['required', 'active_url'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'zalo' => ['required'],
            'country' => ['required', 'integer'],
            'district' => ['nullable', 'integer'],
            'city' => ['nullable', 'integer'],
            'address' => ['string', 'max:255'],
            'map_link' => ['nullable']
        ];
    }
}
