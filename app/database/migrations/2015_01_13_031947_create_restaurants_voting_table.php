<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsVotingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("restaurants_voting", function ($table) {
			$table->increments("id");
			$table->integer("user_id");
			$table->integer("restaurant_id");
			$table->date("date");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("restaurants_voting");
	}

}
