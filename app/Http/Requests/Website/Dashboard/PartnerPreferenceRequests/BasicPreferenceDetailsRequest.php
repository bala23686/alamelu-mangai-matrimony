<?php

namespace App\Http\Requests\Website\Dashboard\PartnerPreferenceRequests;

use Illuminate\Foundation\Http\FormRequest;

class BasicPreferenceDetailsRequest extends FormRequest
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
            'partner_age_from' => 'numeric',
            'partner_age_to' => 'numeric',
            'partner_height_to' => 'numeric',
            'partner_height_from' => 'numeric',
            'partner_martial_status' => 'numeric',
            'partner_complexion' => 'array',
            'partner_mother_tongue' => 'array',
            'partner_country' => 'array',
        ];
    }
}
