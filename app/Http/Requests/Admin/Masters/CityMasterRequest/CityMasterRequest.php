<?php

namespace App\Http\Requests\Admin\Masters\CityMasterRequest;

use Illuminate\Foundation\Http\FormRequest;

class CityMasterRequest extends FormRequest
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
        'city_name'=>['required'],
        'state_id'=>['required','exists:state_masters,id'],
        ];
    }
}
