<?php

namespace App\Http\Requests\Api\AuthValidation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'first_name'   => 'required_without_all:last_name,phone_number',
            'last_name'    => 'required_without_all:first_name,phone_number',
            'phone_number' => 'required_without_all:first_name,last_name',
        ];
    }
}
