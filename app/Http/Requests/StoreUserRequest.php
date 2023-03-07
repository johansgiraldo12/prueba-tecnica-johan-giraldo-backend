<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'cedula'       => 'required|unique:users,cedula',
            'email'        => 'required|email|max:150|unique:users,email',
            'names'        => 'required|max:100|min:5',
            'lastNames'    => 'required|max:100',
            'countryName'  => 'required',
            'celular'      => 'required|min:10|max:10',
            'address'      => 'required|max:180'
        ];
    }
}
