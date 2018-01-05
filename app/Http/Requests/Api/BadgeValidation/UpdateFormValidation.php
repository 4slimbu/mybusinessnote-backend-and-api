<?php

namespace App\Http\Requests\Api\BadgeValidation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormValidation extends FormRequest
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
            'name' => 'required',
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'message' => 'required'
        ];
    }
}