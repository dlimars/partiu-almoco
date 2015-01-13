<?php

class RestaurantRepositoryTest extends TestCase {

	private $repository;

	public function setUp() {
		parent::setUp();
		$this->repository = new RestaurantRepository;
	}

	public function testGetMostVotedRestaurant()
	{
		$date = "2010-10-10";

		$votations = [
			[ "user_id" => 1, "restaurant_id" => 1, "date" => $date ],
			[ "user_id" => 2, "restaurant_id" => 2, "date" => $date ],
			[ "user_id" => 3, "restaurant_id" => 3, "date" => $date ],
			[ "user_id" => 4, "restaurant_id" => 2, "date" => $date ]
		];

		foreach ($votations as $votation) {
			RestaurantsVoting::Create($votation);
		}

		$restaurant = $this->repository->getMostVotedRestaurant($date);
		$this->assertEquals(2, $restaurant->id);
	}
}
