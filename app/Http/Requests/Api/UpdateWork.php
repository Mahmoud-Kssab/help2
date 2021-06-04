<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWork extends FormRequest
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
            'status'        => 'required|in:open,close',
            'des'           => 'required|string',
            'category_id'   => 'required|array|exists:categories,id',
            'image'         => 'required|file',
            'time'          => 'sometimes|nullable|integer',

        ];
    }
}
