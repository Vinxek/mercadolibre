<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules = [
			'user_name' => ['required', 'string'],
			'email' => ['required', 'string'],
			'name' => ['required', 'string'] ,
			'last_name' => ['required', 'string'],
			'phone_number' => ['required', 'string'],
			'file' => ['nullable', 'image']
			];

			return $rules;
    }
}
