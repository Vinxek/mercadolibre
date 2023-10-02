<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
	protected $model = Category::class;
    public function run()
    {
        $categories = [
            'PC parts',
            'Gaming Accessories',
            'Game Cards',
            'Card Games',
            'Collectable Figurines',
        ];

        foreach ($categories as $categoryName) {
            $category = Category::create(['category_name' => $categoryName]);

            Product::factory(10)->create([
                'category_id' => $category->id,
            ]);
        }
    }
}
