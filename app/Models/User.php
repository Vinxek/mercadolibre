<?php

namespace App\Models;
use App\Models\Purchase;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, SoftDeletes, HasRoles, Notifiable;


    protected $fillable = [
        'user_name',
        'email',
        'password',
        'name',
        'last_name',
        'phone_number',
    ];

	protected $appends = ['full_name'];

    protected $hidden = [
        // 'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	public function getFullNameAttribute(){
		return "{$this->name} {$this->last_name}";  //This line of code brings the two attribues of the model together once is called.
	}

	public function setPasswordAttribute($value){
		$this->attributes['password'] = bcrypt($value); // this line of code takes the password and encrypts it using bcrypt
	}

	public function userPurchases()
	{
		return $this->hasMany(Purchase::class, 'user_id', 'id');
	}

	public function file()
	{
		return $this->morphOne(File::class, 'fileable');
	}
}
