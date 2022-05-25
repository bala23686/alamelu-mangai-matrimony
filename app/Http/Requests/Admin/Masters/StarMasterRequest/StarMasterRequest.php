<?php

namespace App\Http\Requests\Admin\Masters\StarMasterRequest;

use Illuminate\Foundation\Http\FormRequest;

class StarMasterRequest extends FormRequest
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
            'star_name' => ['required'],
            'star_rasi_id' => ['required','exists:rasi_masters,id']

        ];
    }
}
