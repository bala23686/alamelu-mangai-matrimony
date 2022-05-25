<?php

namespace App\Http\Requests\Admin\Masters\ReligionMasterRequest;

use Illuminate\Foundation\Http\FormRequest;

class ReligionMasterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  Auth()->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'religion_name' => ['required']
        ];
    }
}
