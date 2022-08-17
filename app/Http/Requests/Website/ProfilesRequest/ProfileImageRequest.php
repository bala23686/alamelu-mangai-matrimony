<?php

namespace App\Http\Requests\Website\ProfilesRequest;

use Illuminate\Foundation\Http\FormRequest;

class ProfileImageRequest extends FormRequest
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
            'profileImage' => ['required', 'max:2048', 'file', 'mimes:png,jpg,jpeg']
        ];
    }
    public function messages()
    {
        return [
            'profileImage.mimes' => 'Only files with following extensions are allowed:png,jpg,jpeg'
        ];
    }
}
