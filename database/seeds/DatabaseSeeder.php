<?php

use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// $this->call(UsersTableSeeder::class);
		Category::unguard();
		Category::truncate();
		factory(Category::class, 30)->create();
		Category::reguard();
	}
}
