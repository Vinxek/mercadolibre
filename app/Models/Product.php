<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

	protected $fillable = [
		'category_id',
        'product_name',
        'description',
        'price',
        'stock',
    ];

	protected $appends = ['format_description'];

	public function formatDescription(): Attribute
	{
		return Attribute::make(
			get: function ($value, $attribute){
				return Str::limit($attribute['description'], 50, '...');
			},
		);
	}

	// public function getPriceAttribute($value)
    // {
    //     return '$' . number_format($value / 1000, 3, '.', '');
    // }

	public function category()
	{
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}

	public function purchases()
	{
		return $this->hasMany(Purchase::class, 'product_id', 'id');
	}

	public function file()
	{
		return $this->morphOne(File::class, 'fileable');
	}

}
