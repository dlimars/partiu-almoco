<?php

class AuthController extends BaseController {
	
	public function anyLogin () {
		$email 		= Input::get("email");
		$password 	= Input::get("password");

		if (Auth::attempt(['email' => $email, 'password' => $password])) {
			return Redirect::to('/');
		}
		return Redirect::to('/')->with("error", "Falha no login");
	}

	public function anyLogout () {
		Auth::logout();
		return Redirect::to("/");
	}

}