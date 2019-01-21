<?php

class UserTableSeeder extends Seeder{

	public function run()
	{
		DB::table('users')->delete();

		User::create(array(
			'name' => 'Marianna',
			'last_name' => 'Pessolano',
			'email' => 'mpessolano@test.com',
			'address' => 'Calle 25 de Mayo #566',
			'phone' => 45218887,
			'username' => 'mpessolano',
			'level' => 0,
			'password' => Hash::make('1234'),
		));

		// Creamos otro usuario
		User::create(array(
			'name' => 'Pedro',
			'last_name' => 'Perez',
			'email' => 'pedro.perez@test.com',
			'address' => 'Av. del sol #1546',
			'phone' => 542177711,
			'username' => 'pedro.perez',
			'level' => 1,
			'password' => Hash::make('abc'),
		));
	}
}