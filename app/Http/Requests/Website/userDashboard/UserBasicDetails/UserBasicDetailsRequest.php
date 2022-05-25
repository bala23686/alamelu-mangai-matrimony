<?php

namespace App\Http\Requests\Website\userDashboard\UserBasicDetails;

use Illuminate\Foundation\Http\FormRequest;

class UserBasicDetailsRequest extends FormRequest
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
            'fname' => 'required',
            'lname' => 'required',
            'mobile' => 'required|unique:user_basic_info_masters,user_mobile_no',
            'age' => 'required',
            'height' => 'required',
            'martial_status' => 'required',
            'mother_tongue' => 'required',
            'eating_habit' => 'required',
            'disability' => 'required',
        ];
    }
}
