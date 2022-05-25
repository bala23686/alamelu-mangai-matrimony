<?php

namespace App\Http\Requests\Admin\Masters\PackageMasterRequest;

use Illuminate\Foundation\Http\FormRequest;

class PackageMasterRequest extends FormRequest
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
            'package_name'=>['required'],
            'package_allowed_profile'=>['required'],
            'package_photo_upload'=>['required'],
            'package_valid_for'=>['required'],
            'package_interest_allowed'=>['required'],
            'package_price'=>['required'],
        ];
    }
}
