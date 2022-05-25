<?php

namespace App\Http\Requests\Admin\Masters\CasteMasterRequest;

use Illuminate\Foundation\Http\FormRequest;

class CasteMasterRequest extends FormRequest
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
            'caste_name' => ['required'],
            'caste_religion' => ['required','exists:religion_masters,id']

        ];
    }
}
