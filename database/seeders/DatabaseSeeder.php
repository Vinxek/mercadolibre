<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

		$this->call([
			RoleSeeder::class,
			CategorySeeder::class,
			adminSeeder::class
		]);
		User::factory(10)->create();

    }
}
