<?php

namespace App\Http\Requests\Admin\Masters\JobMasterRequest;

use Illuminate\Foundation\Http\FormRequest;

class JobMasterRequest extends FormRequest
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
            'job_name'=>['required']
        ];
    }
}
