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

// Rutas del sistema
Route::controller('package', 'PackageController');
Route::controller('users', 'UsersController');
Route::controller('user/getuser', 'GetUserController'); // Peticion Ajax

Route::get('/pdf', function()
{
	$html =   '<html><body>'
			. '<p>Put your html here, or generate it with your favourite '
			. 'templating system.</p>'
			. '</body></html>';

	return PDF::load($html, 'A4', 'portrait')->show();
});

// Usar librerias personalizadas en Laravel 4
Route::get('hola', function()
{
	return Mensaje::men("Hola Marianna");
});

Route::controller('men', 'HolaController');

Route::get('vista', function()
{
	return View::make('hola');
});

// Importar archivos php en Laravel 4
Route::get('mensaje', function()
{
	return View::make('mensaje');
});
