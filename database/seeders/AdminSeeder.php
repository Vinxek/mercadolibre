<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{

    public function run()
    {
        $user = new User([
			'user_name' => 'Vinxek',
			'email'=> 'vinxek@me.com',
			'name' => 'Kevin',
			'Last_name' => 'Giraldo',
			'phone_number' => '3183724560',
			'password' => 'Nowloading25',
			'remember_token' => Str::random(30)
		]);
		$user->assignRole('admin');
		$user->save();
    }
}
