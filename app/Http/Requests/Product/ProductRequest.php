<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

	protected $rules = [
        'category_id' => ['required', 'exists:categories,id'],
        'product_name' => ['required', 'string'],
        'description' => ['required', 'string'],
        'price' => ['required', 'numeric'],
        'stock' => ['required', 'numeric'],
		'file' => ['required', 'file']
        ];

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return $this->rules;
    }
}
