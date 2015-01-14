<?php

Validator::resolver(function($translator, $data, $rules, $messages) {
    return new RestaurantVotingValidator($translator, $data, $rules, $messages);
});

App::bind("getDaysOfWeek", function ($app, $day) {

	$weekNumber = date("w", strtotime($day));

	$begin = new DateTime( date("Y-m-d", strtotime($day . " - " . $weekNumber . " day")) );
	$end = new DateTime( date("Y-m-d", strtotime($day)) );
	$end = $end->modify( '+1 day' ); 

	$interval = new DateInterval('P1D');
	$daterange = new DatePeriod($begin, $interval ,$end);

	$week = [];

	foreach($daterange as $date){
		$week[] = $date->format("Y-m-d");
	}

	array_pop($week);

	return $week;
});

App::bind("userHasVoted", function ($app) {
	if(Auth::check()) {
		return RestaurantsVoting::where("user_id", Auth::user()->id)
							->where("date", date("Y-m-d"))
							->count() > 0;
	}
	return false;
});