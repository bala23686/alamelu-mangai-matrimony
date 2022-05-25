<?php

namespace App\Http\Requests\Website\Dashboard\ProfilesRequests;

use Illuminate\Foundation\Http\FormRequest;

class BasicDetailsRequest extends FormRequest
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
            'user_full_name' => 'required',
            'mobile' => 'required|numeric',
            'age' => 'required',
            'height' => 'required',
            'about' => '',
            'gender' => 'required',
            'dob' => 'required',
            'user_complexion' => 'required',
            'martial_status' => 'required',
            'mother_tongue' => 'required',
            'eating_habit' => 'required',
            'disability' => 'required',

        ];
    }
}
