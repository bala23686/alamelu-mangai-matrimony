<?php

namespace App\Http\Requests\Payments;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserPaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "user_id"=>['required','exists:users,id'],
            "tr_package_name"=>['required'],
            "tr_package_price"=>['required'],
            "tr_amount_paid"=>['required'],
            "tr_package_views"=>['required'],
            "tr_package_photo_upload"=>['required'],
            "tr_package_interest"=>['required'],
            "tr_mode"=>['required'],
            "package_id"=>['required'],
        ];
    }
}
