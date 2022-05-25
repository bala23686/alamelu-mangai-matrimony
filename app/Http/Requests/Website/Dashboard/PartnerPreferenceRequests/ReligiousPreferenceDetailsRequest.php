<?php

namespace App\Http\Requests\Website\Dashboard\PartnerPreferenceRequests;

use Illuminate\Foundation\Http\FormRequest;

class ReligiousPreferenceDetailsRequest extends FormRequest
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

            'partner_religion' => '',
            'partner_caste' => '',
            'partner_rasi' => '',

        ];
    }
}
