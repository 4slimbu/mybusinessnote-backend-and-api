<?php

namespace App\Http\Requests\Admin\BadgeValidation;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormValidation extends FormRequest
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
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'message' => 'required'
        ];
    }
}
