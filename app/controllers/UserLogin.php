<?php

class UserLogin extends BaseController {

	public function user()
	{
		// get POST data
		$userdata = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);

		if(Auth::attempt($userdata))
		{
			// We are now logged in, got to admin
			return View::make('hello');
		}
		else
		{
			return Redirect::to('/')->with('login_errors', true);
		}
	}

}