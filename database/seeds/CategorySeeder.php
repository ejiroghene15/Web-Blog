<?php

use App\Categories;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Categories::create([
			'category' => 'Food'
		]);
	}
}
