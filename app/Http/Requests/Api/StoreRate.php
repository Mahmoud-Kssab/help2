<?php

namespace App\Http\Requests\ApI;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreRate extends FormRequest
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
            'quality_rate' => ['required','numeric','between:0,5.0'],
            'price_rate' => ['required','numeric','between:0,5.0'],
            'personal_rate' => ['required','numeric','between:0,5.0'],
            'comment' => ['sometimes','nullable','string'],
            'rated_id' => ['required','integer'],
        ];
        
    }
}
