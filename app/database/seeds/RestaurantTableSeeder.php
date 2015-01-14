<?php

class RestaurantTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		foreach(range(1, 9) as $num) {
			Restaurant::create([
				"name" 			=> "Restaurante " . $num,
				"description"	=> "Comida deliciosa todos os dias",
				"logo_path"		=> "/assets/img/restaurants/restaurant_" . $num . ".jpg"
			]);
		}
	}

}
