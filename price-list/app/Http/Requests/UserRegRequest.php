<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company-name' => 'required|min:2|max:45|regex:/^\S*$/u',
            'user-name' => 'required|min:2|max:45',
            'email' => 'required|email|min:7|max:30',
            'password' => 'required|confirmed|min:6|max:20',
            'reply-password' => 'min:6|max:20'
        ];
    }

    public function attributes() 
    {
        return [
            'company-name' => 'Назва компанії',
            'user-name' => 'І\'мя ',
            'email' => 'Електронна адреса',
            'password' => 'Пароль',
            'reply-password' => 'Повторіть пароль'
        ];
    }
}
