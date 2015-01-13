<?php

class RestaurantsVoting extends Eloquent {

	public $table = "restaurants_voting";

	public $fillable = ["restaurant_id", "user_id", "date"];

	public $timestamps = false;
}