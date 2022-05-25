<?php

namespace App\Http\Requests\Website\Dashboard\ProfilesRequests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessionalDetailsRequest extends FormRequest
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
            'user_education' => ['required', 'array'],
            'user_education_details' => '',
            'user_job' => 'required',
            'user_job_details' => '',
            'user_working_country' => ['required', 'exists:country_masters,id'],
            'user_working_state' => ['required', 'exists:state_masters,id'],
            'user_working_city' => ['required', 'exists:city_masters,id'],
            'user_annual_income' => 'required',
        ];
    }
}
