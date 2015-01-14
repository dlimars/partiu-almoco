<?php

class RestaurantVotingValidatorTest extends TestCase {

	private $validator;

	public function setUp() {
		parent::setUp();
		$this->validator = App::make("RestaurantVotingValidator");
	}

	public function testValidateCheckTimeToVote() {
		$assert1 = $this->validator->validateCheckTimeToVote(null, "2010-10-10 10:30", ["11:00"]);
		$this->assertTrue($assert1);

		$assert2 = $this->validator->validateCheckTimeToVote(null, "2010-10-10 11:31", ["11:30"]);
		$this->assertFalse($assert2);

		$assert3 = $this->validator->validateCheckTimeToVote(null, "2010-10-10 10:31", ["10:30"]);
		$this->assertFalse($assert3);
	}

	public function testValidateCheckUserHasVoted() {
		RestaurantsVoting::create(["user_id"=>1, "restaurant_id"=>1, "date"=> "2012-12-12"]);
		$assert1 = $this->validator->validateCheckUserHasVoted(null, 1, ["2012-12-12"]);
		$this->assertFalse($assert1);

		$assert2 = $this->validator->validateCheckUserHasVoted(null, 2, ["2012-12-12"]);
		$this->assertTrue($assert2);

		$assert3 = $this->validator->validateCheckUserHasVoted(null, 2, ["2012-12-11"]);
		$this->assertTrue($assert3);
	}

	public function testValidateCheckRestaurantAvailableToVote() {
		$assert1 = $this->validator->validateCheckRestaurantAvailableToVote(null, 1, ["2015-01-02"]);
		$this->assertTrue($assert1);

		RestaurantsVoting::create(["user_id"=>1, "restaurant_id"=>1, "date"=> "2015-01-01"]);
		$assert2 = $this->validator->validateCheckRestaurantAvailableToVote(null, 1, ["2015-01-02"]);
		$this->assertFalse($assert2);

		$assert3 = $this->validator->validateCheckRestaurantAvailableToVote(null, 2, ["2015-01-02"]);
		$this->assertTrue($assert3);
	}

}