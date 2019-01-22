<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Llamamos al controlador RESTful esto enrutara a todos los metodos a la vez

Route::get('/', function()
{
	return View::make('login');
});

// Login
Route::post('login', 'UserLogin@user');

// Logout
Route::get('logout', function()
{
	Auth::logout();
	return Redirect::to('/');
});

// Ruta de administración
Route::get('admin', array('before' => 'auth', function()
{
	return View::make('dashboard.index');
}));

/*
// Comprobar validación Auth::check en la vista dashboard.index
Route::get('admin2', function()
{
	return View::make('dashboard.index');
});
*/

// Rutas del sistema
Route::controller('package', 'PackageController');

Route::get('registrar', function()
{
	$user = new User;
	$user->name = "Mario";
	$user->last_name = "Valle";
	$user->email = "marito@gmail.com";
	$user->address = "Calle centenario #222";
	$user->phone = 45882222;
	$user->username = "mario2";
	$user->level = 0;
	$user->password = Hash::make('123');

	// Guardamos
	$user->save();
	return "El usuario fue agregado.";
});

Route::get('login2', array('before' => 'auth.basic', function()
{
	return View::make('hello');
}));