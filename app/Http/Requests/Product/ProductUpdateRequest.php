<?php

namespace App\Http\Requests\product;

use App\Http\Requests\Product\ProductRequest;

class ProductUpdateRequest extends ProductRequest
{

    public function rules()
    {
		$this->rules['file'] = ['nullable', 'image'];
		return $this->rules;
    }
}
