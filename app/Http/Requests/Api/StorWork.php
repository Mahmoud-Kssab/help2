<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StorWork extends FormRequest
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

            'title'         => 'required|string',
            'des'           => 'required|string',
            'category_id'   => 'required|exists:categories,id',
            'image'         => 'required|file',
            'ex_date'       => 'sometimes|nullable',

        ];
    }
}