<?php

namespace App\Http\Requests\Api\BusinessOptionValidation;

use Illuminate\Foundation\Http\FormRequest;

class EntryBusinessOptionRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required',
            'password' => 'required|min:8|max:20',
            'business_category_id' => 'required',
            'sell_goods' => 'required',
            'captcha_response'=>'recaptcha'
        ];
    }

}
