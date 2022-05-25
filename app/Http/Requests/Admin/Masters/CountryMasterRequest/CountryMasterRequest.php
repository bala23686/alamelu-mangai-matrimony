<?php

namespace App\Http\Requests\Admin\Masters\CountryMasterRequest;

use Illuminate\Foundation\Http\FormRequest;

class CountryMasterRequest extends FormRequest
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
            'country_name' => ['required']
        ];
    }
}
