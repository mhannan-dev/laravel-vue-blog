<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'bio' => 'required',
            'type' => 'required',
            'password' => 'required|min:6'
        ];

    }

    public function messages()
    {
        return [
            'name' => 'Please enter name',
            'email' => 'Please enter email',
            'bio' => 'Please enter bio',
            'type' => 'Please select user type',
            'password' => 'Please enter password'


        ];

    }

}
