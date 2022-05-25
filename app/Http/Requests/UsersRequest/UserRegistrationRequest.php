<?php

namespace App\Http\Requests\UsersRequest;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
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
            'username' => ['required'],
            'phonenumber' => ['required'],
            'email' => ['required'],
            'password' => ['required', 'confirmed'],
            'gender' => ['required'],
            'dob' => ['required', 'date'],
            'religion' => ['required'],
            'caste' => ['required']

        ];
    }
}
