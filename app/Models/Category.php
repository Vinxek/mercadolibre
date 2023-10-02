<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;

	protected $fillable = [
        'category_id',
    ];

	public function products()
	{
		return $this->hasMany(Product::class, 'product_id', 'id');
	}
}
