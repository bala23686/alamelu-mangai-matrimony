<?php

namespace App\Http\Requests\Website\Dashboard\DocumentUpload;

use Illuminate\Foundation\Http\FormRequest;

class CollegeTcUploadRequest extends FormRequest
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
            'clg_tc' => ['required', 'max:2048', 'file']
        ];
    }
    public function messages()
    {
        return [
            'clg_tc.max' => 'Maximum file size to upload is 2MB.'
        ];
    }
}
