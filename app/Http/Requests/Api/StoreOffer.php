<?php

namespace App\Http\Requests\ApI;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreOffer extends FormRequest
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

            'work_id'   => ['required'],
            'content'   => ['required','string'],
            'min_price' => ['required'],
            'max_price' => ['required'],
            'title'     => ['required'],

        ];


    }
}
