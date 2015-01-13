<?php

class RestaurantRepository {

	public function getAllRestaurants () {
		return Restaurant::all();
	}

	public function getMostVotedRestaurant ($date) {
		return Restaurant::leftJoin("restaurants_voting", "restaurants.id", "=", "restaurant_id")
							->where("date", $date)
							->groupBy("restaurant_id")
							->selectRaw("restaurants.id, restaurants.name, restaurants.description, restaurants.logo_path, count(*) as count")
							->orderBy("count", "DESC")
							->limit(1)
							->first();
	}

	public function voteForRestaurant ($dateTime, $userId, $restaurantId) {

		$data = [	"restaurant_id" => $restaurantId,
					"user_id"		=> $userId,
					"date"			=> date("Y-m-d", strtotime($dateTime)) ];

		$rules = [
			"date" 			=> "CheckTimeToVote",
			"user_id"		=> "CheckUserHasVoted:" . $dateTime,
			"restaurant_id"	=> "CheckRestaurantAvailableToVote:" . $dateTime
		];

		$validator = Validator::make($data, $rules);

		if ($validator->passes()) {
			RestaurantsVoting::create($data);
			return true;
		}
		return false;
	}
}