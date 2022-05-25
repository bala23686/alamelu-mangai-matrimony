<?php

namespace App\Http\Requests\Website\Dashboard\ProfilesRequests;

use Illuminate\Foundation\Http\FormRequest;

class ReligiousDetailsRequest extends FormRequest
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
            'user_religion' => ['required','exists:religion_masters,id'],
            'user_caste' => ['required','exists:caste_masters,id'],
            'user_subcaste' => ['required'],
            'user_rasi' => ['required','exists:rasi_masters,id'],
            'user_star' => ['required','exists:star_masters,id'],
            'user_dhosam' => ['required'],
            'dhosam_details' => ['required_if:user_dhosam,1'],
            'user_btime' => ['required'],
            'user_bplace' => ['required'],
        ];
    }
}
