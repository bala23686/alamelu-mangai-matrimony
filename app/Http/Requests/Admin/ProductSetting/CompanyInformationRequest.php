<?php

namespace App\Http\Requests\Admin\ProductSetting;

use Illuminate\Foundation\Http\FormRequest;

class CompanyInformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  Auth()->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_name'=>['required'],
            'company_slogan'=>['required'],
            'company_address'=>['required'],
            'company_state'=>['required'],
            'company_city'=>['required'],
            'company_country'=>['required'],
            'company_pincode'=>['required'],
            'company_contact_number'=>['required'],
            'company_whatsapp_number'=>['required'],
            'company_email'=>['required'],
            'company_about'=>['required'],
            'company_fb_link'=>['required'],
            'company_youtube_link'=>['required'],
        ];
    }
}
