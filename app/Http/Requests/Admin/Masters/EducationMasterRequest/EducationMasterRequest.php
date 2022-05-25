<?php

namespace App\Http\Requests\Admin\Masters\EducationMasterRequest;

use Illuminate\Foundation\Http\FormRequest;

class EducationMasterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth()->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'education_name'=>['required']
        ];
    }
}
