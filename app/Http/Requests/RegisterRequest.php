<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username'              => ['required', 'string', 'max:255'],
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ];
    }

//    public function attributes()
//    {
//        return [
//            'username' => 'email address',
//            'name' => 'email address',
//            'email' => 'email address',
//            'password' => 'email address',
//            'password_confirmation' => 'email address',
//        ];
//    }

//    public function messages()
//    {
//        return [
//            'username.required' => 'A username or e-mail is required',
//            'name.required' => 'A password is required',
//            'email.required' => 'A password is required',
//            'password.required' => 'A password is required',
//            'password_confirmation.required' => 'A password is required',
//        ];
//    }

}
