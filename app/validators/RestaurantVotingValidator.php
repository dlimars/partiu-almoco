<?php

class RestaurantVotingValidator extends Illuminate\Validation\Validator {

	public function validateCheckTimeToVote($attribute, $value, $parameters) {
        
        $dateVoting  = date("Y-m-d", strtotime($value));
        $dateTimeVoting  = date("Y-m-d H:i:s", strtotime($value));

        $maxHour = isset($parameters[0]) ? $dateVoting." ".$parameters[0] : $dateVoting." 11:30:00";

        $dateMax     = date("Y-m-d ".$maxHour);

        if (date("Y-m-d", strtotime($dateVoting)) == date("Y-m-d", strtotime($dateMax))) {
            return $dateVoting <= $dateMax;
        }

        return false;
    }

    public function validateCheckUserHasVoted($attribute, $value, $parameters) {
        if (isset($parameters[0])) {
            return RestaurantsVoting::where("user_id", $value)
                                ->where("date", date("Y-m-d", strtotime($parameters[0])))
                                ->count() == 0;
        }
    	return false;
    }

    public function validateCheckRestaurantAvailableToVote($attribute, $value, $parameters) {

        $daysOfWeek = App::make("getDaysOfWeek", date("Y-m-d", strtotime($parameters[0])));

        var_dump($daysOfWeek, $parameters);

        if (count($daysOfWeek) > 0) {

            $restaurants = Restaurant::leftJoin("restaurants_voting", "restaurants.id", "=", "restaurant_id")
                                ->groupBy("restaurant_id, date")
                                ->selectRaw("restaurants.id, count(*) as count")
                                ->orderBy("count", "DESC")
                                ->whereIn("date", $daysOfWeek)
                                ->get();

            foreach ($restaurants as $restaurant) {
                if ($restaurant->id == $value) {
                    return false;
                }
            }
        }

    	return true;
    }
	
}