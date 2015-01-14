<?php

class HomeController extends BaseController {

	private $restaurantRepository;

	public function __construct(RestaurantRepository $repository) {
		$this->restaurantRepository = $repository;
	}

	public function showWelcome()
	{
		$data = [];

		if (date("H:i:s") > Config::get("app.time_to_vote")) {
			$restaurant = $this->restaurantRepository->getMostVotedRestaurant(date("Y-m-d"));
			if ($restaurant) {
				$data['most_voted'] = $restaurant;
			} else {
				$data['undefined_voting'] = true;
			}
		}

		return View::make("hello", $data);
	}

}
