<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StorUser extends FormRequest
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

            'name'              =>  'required|string|max:255',
            'type'              =>  'required|in:client,worker',
            'phone'             =>  'required',
            'email'             =>  'required|string|email|unique:users',
            'nationality'       =>  'required|string',
            'years_skills'      =>  'required|integer',
            'degree'            =>  'required|string',
            'city_id'           =>  'required|integer|exists:cites,id',
            'whats_number'      =>  'required|string',
            'password'          =>  'required|string|min:8|confirmed'
        ];
    }
}
