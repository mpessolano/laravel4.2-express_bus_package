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
