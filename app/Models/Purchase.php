<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use HasFactory, SoftDeletes;

	protected $fillable = [
        'product_id',
        'category_id',
        'purchase_date',
        'quantity',
        'total_price',
    ];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}

	public function products()
	{
		return $this->belongsTo(Product::class, 'product_id', 'id');
	}

}
