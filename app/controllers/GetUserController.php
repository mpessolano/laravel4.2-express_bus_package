<?php

// Controlador para peticiones Ajax

class GetUserController extends BaseController { 

	public function postData()
	{
		$user_id = Input::get('user');

		$user = User::find($user_id);

		$data = array(
			'success'   => true,
			'id'        => $user->id,
			'name'      => $user->name,
			'last_name' => $user->last_name,
			'email'     => $user->email,
			'address'   => $user->address,
			'phone'     => $user->phone,
			'username'  => $user->username,
			'level'     => $user->level
		);

		return Response::json($data);
	}

}
