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

Route::get('creartabla', function()
{
	Schema::create('users', function($tabla)
	{
		$tabla->increments('id');
		$tabla->string('name');
		$tabla->string('last_name');
		$tabla->string('email')->unique();
		$tabla->string('address');
		$tabla->integer('phone');
		$tabla->string('username')->unique();
		$tabla->boolean('level');
		$tabla->string('password');
		$tabla->timestamps();
	});

	return 'La tabla fue creada con exito';
});

Route::get('registrar', function()
{
	$user = new User;
	$user->name = "Raúl";
	$user->last_name = "Contreras";
	$user->email = "raulito21@test.com";
	$user->address = "Calle 9 de julio #244";
	$user->phone = 52224799;
	$user->username = "ra21";
	$user->level = 0;
	$user->password = Hash::make('hola');
	// Guardamos
	$user->save();

	return 'El usuario fue agregado.';
});
