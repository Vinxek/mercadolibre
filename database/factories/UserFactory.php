<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


class UserFactory extends Factory
{
	protected $model = User::class;
    public function definition()
    {
        return [
            'user_name' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => fake()->password(), // password
			'name' => fake()->name(),
			'last_name' => fake()->lastName(),
			'phone_number' => fake()->phoneNumber(),
            'remember_token' => Str::random(10),
        ];
    }

    public function configure()
	{
		return $this->afterCreating(function (User $user) {
			$user->assignRole('user');
			$file = new File(['route' => '/storage/images/users/default.png']);
			$user->file()->save($file);
		});
	}
}
