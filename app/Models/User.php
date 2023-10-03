<?php

namespace App\Models;

use App\Models\Purchase;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, SoftDeletes, Notifiable;


    protected $fillable = [
        'user_name',
        'email',
        'password',
        'name',
        'last_name',
        'phone_number',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	public function userPurchases()
	{
		return $this->hasMany(Purchase::class, 'user_id', 'id');
	}
}
