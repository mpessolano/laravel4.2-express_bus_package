<?php

class UsersController extends BaseController
{

	public function __construct()
	{
		$this->beforeFilter('auth'); // Bloqueo de acceso
	}

	public function getIndex()
	{
		$my_id = Auth::user()->id;
		$level = Auth::user()->level;

		// Control permissions only access administrator (ad)
		if($level == 1)
		{
			$users = DB::table('users')->where('level', '<>', '1')->where('id', '<>', $my_id)->get();
			return View::make('users.index')->with('users', $users);
		}
		else
		{
			return View::make('errors.access_denied_ad');
		}
	}

	// Metodo para agregar un usuario
	public function postCreate()
	{
		// Validamos reglas inputs
		$rules = array(
			'name'      => 'required|max:50',
			'last_name' => 'required|max:50',
			'email'     => 'required|email|unique:users',
			'address'   => 'required|max:50',
			'phone'     => 'required|numeric|min:5',
			'username'  => 'required|max:50',
			'password'  => 'required|min:8',
		);

		$validation = Validator::make(Input::all(), $rules);

		if($validation->fails())
		{
			return Redirect::back()->with_input(Input::all())->with_errors($validation->errors());
		}

		// Si todo esta bien guardamos
		$password = Input::get('password');

		$user = new User;
		$user->name = Input::get('name');
		$user->last_name = Input::get('last_name');
		$user->email = Input::get('email');
		$user->address = Input::get('address');
		$user->phone = Input::get('phone');
		$user->username = Input::get('username');
		$user->level = Input::get('level');
		$user->password = Hash::make($password);

		// Guardamos
		$user->save();

		// Redirigimos a usuarios
		return Redirect::to('users')->with('status', 'ok_create');
	}
	
	// Eliminar usuarios
	public function getDelete($user_id)
	{
		// Buscamos el usuario en la base de datos segun la id enviada
		$user = User::find($user_id);
		// Eliminamos y redirigimos
		$user->delete();
		
		return Redirect::to('users')->with('status', 'ok_delete');
	}

	// Metodo para actualizar datos del usuario
	public function postUpdate()
	{
		$user_id = Input::get('user_id');
		$user = User::find($user_id);

		$user->name      = Input::get('name_edit');
		$user->last_name = Input::get('last_name_edit');
		$user->email     = Input::get('email_edit');
		$user->address   = Input::get('address_edit');
		$user->phone     = Input::get('phone_edit');
		$user->level     = Input::get('level');
		$user->username  = Input::get('username_edit');

		$user->save();
		return Redirect::to('users')->with('status', 'ok_update');
	}

}