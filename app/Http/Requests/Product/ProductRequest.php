<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
        'category_id' => ['required', 'exists:categories,id'],
        'product_name' => ['required', 'string'],
        'description' => ['required', 'string'],
        'price' => ['required', 'numeric'],
        'stock' => ['required', 'numeric'],
        ];
    }
}
