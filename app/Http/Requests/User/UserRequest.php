<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        'password' =>['required', 'confirmed', 'string', 'min:6'],
        'name' => ['required', 'string'] ,
        'last_name' => ['required', 'string'],
        'phone_number' => ['required', 'string'],
		];

		if($this->method() == 'POST'){
			array_push($rules['user_name'], 'unique:users,user_name');
			array_push($rules['email'], 'unique:users,email');
		}else{
			array_push($rules['user_name'], 'unique:users,user_name, ' . $this->user->id);
			array_push($rules['email'], 'unique:users,email, ' . $this->user->id);
		}

        return $rules;
    }
}
