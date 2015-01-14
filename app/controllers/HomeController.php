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
			$restaurant = $this->restaurantRepository
							   ->getMostVotedRestaurant(date("Y-m-d"));
			if ($restaurant) {
				$data['most_voted'] = $restaurant;
			} else {
				$data['undefined_voting'] = true;
			}
		}

		$data["restaurants"] = $this->restaurantRepository
									->getAvailableRestaurants(date("Y-m-d"));

		return View::make("hello", $data);
	}

	public function voteForRestaurant($restaurantId){
		$status = $this->restaurantRepository
			 		   ->voteForRestaurant(date("Y-m-d H:i:s"),
			 					 Auth::user()->id,
			 					 $restaurantId);

		if ($status) {
			return Redirect::to("/")->with("vote_error", "Seu voto não foi computado, talvez você já tenha votado ou o prazo para votação foi encerrado!");
		}

		return Redirect::to("/");
	}

}
