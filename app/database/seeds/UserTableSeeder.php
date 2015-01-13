<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$users = [
			"Juliano Silva" 	=> "juliano@db.com.br",
			"Daniel Lima"		=> "daniel@db.com.br",
			"Zuleica Machado"	=> "zuleica@db.com.br",
			"Aline Borba"		=> "aline@db.com.br",
			"Marcelo Soares"	=> "marcelo@db.com.br",
			"Osmar José"		=> "osmar@db.com.br",
			"Camila Santos"		=> "camila@db.com.br"
		];

		foreach($users as $name => $email) {
			User::create([
				"name" 		=> $name,
				"email"		=> $email,
				"password"	=> Hash::make("123")
			]);
		}
	}

}
