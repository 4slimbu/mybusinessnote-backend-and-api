<?php

namespace App\Http\Requests\Api\BusinessValidation;

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
            'business_name'        => '',
            'sell_goods'           => 'boolean',
            'business_category_id' => 'numeric',
            'website'              => 'url',
            'abn'                  => '',
        ];
    }
}
