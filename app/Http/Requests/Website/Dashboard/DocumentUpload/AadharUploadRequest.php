<?php

namespace App\Http\Requests\Website\Dashboard\DocumentUpload;

use Illuminate\Foundation\Http\FormRequest;

class AadharUploadRequest extends FormRequest
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
            'userAdharCard' => ['required', 'file', 'max:2048'],
            'userAdharCardNo' => ['required']
        ];
    }
    public function messages()
    {
        return [
            'userAdharCard.max' => 'Maximum file size to upload is 2MB.'
        ];
    }
}
