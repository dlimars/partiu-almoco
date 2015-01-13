<?php

class RestaurantVotingValidator extends TestCase {

	private $validator;

	public function setUp() {
		parent::setUp();
		$this->validator = App::make("RestaurantVotingValidator");
	}

	public function testValidateCheckTimeToVote() {

		$assert1 = $this->validator->validateCheckTimeToVote("", "2010-10-10 10:30", ["11:30"]);
		// $assert2 = $this->validator->validateCheckTimeToVote("", "2010-10-10 11:31", ["11:30"]);

		$this->assertTrue($assert1);
		// $this->assertFalse($assert2);
	}

}