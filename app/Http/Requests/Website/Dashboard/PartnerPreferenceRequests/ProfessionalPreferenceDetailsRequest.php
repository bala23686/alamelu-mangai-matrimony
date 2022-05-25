<?php

namespace App\Http\Requests\Website\Dashboard\PartnerPreferenceRequests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessionalPreferenceDetailsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'partner_education' => ['array'],
            'partner_education_details' => ['sometimes'],
            'partner_job' => ['array'],
            'partner_job_details' => ['sometimes'],
            'partner_job_country' => ['sometimes'],
            'partner_annual_income' => ['sometimes'],
        ];
    }
}
