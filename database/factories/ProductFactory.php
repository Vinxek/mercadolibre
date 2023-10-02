<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
	protected $model = Product::class;

    public function definition()
    {
        return [
        'category_id'=> fake()->randomElement([1,2,3,4,5]),
        'product_name'=> fake()->sentence(),
        'description' => fake()->paragraph(),
        'price'=> fake()->randomElement([200000,120000,300000]),
        'stock' =>fake()->randomDigitNotZero(),
        ];
    }
}
