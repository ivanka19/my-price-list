<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
            'name' => 'required|min:3|max:50',
            'email' => 'email|required|min:10|max:50',
            'message' => 'required|min:10|max:500'
        ];
    }

    public function attributes() 
    {
        return [
            'name' => 'І\'мя',
            'email' => 'Електронна адреса',
            'message' => 'Повідомлення'
        ];
    }
}
