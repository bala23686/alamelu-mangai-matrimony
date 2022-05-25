<?php

namespace App\Http\Requests\Website\Dashboard\ProfilesRequests;

use Illuminate\Foundation\Http\FormRequest;

class FamilyDetailsRequest extends FormRequest
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
            'user_father_name' => 'required',
            'user_father_job_details' => 'required',
            'user_mother_name' => 'required',
            'user_mother_job_details' => 'required',
            'user_family_status' => ['required','exists:family_status_sub_masters,id'],
            'no_of_sibling' => ['required', 'numeric'],
            'no_of_brothers' => ['required_if:no_of_sibling,gt:0', 'lte:no_of_sibling'],
            'no_of_sisters' => ['required_if:no_of_sibling,gt:0', 'lte:no_of_sibling'],
            'no_of_brothers_married' => ['required_if:no_of_sibling,gt:0', 'lte:no_of_brothers'],
            'no_of_sisters_married' => ['required_if:no_of_sibling,gt:0', 'lte:no_of_sisters'],
            'user_sibling_details' => '',
            'paternal_uncle_address' => ''
        ];
    }
}
