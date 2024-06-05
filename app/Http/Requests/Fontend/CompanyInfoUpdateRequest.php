<?php

namespace App\Http\Requests\Fontend;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;

class CompanyInfoUpdateRequest extends FormRequest
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
        $rules = [
            'logo' => ['image', 'max:1500'],
            'banner' => ['image', 'max:1500'],
            'name' => ['string', 'max:100'],
            'bio' => ['required'],

        ];

        $company =  Company::where('user_id', auth()->user()->id)->first();

        if ((empty($company) || !$company->logo)) {
            $rules['logo'][] = 'required';
        }

        if ((empty($company) || !$company->banner)) {
            $rules['banner'][] = 'required';
        }

        return $rules;
    }
}
