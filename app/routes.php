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
	Schema::create('products', function($tabla)
	{
		$tabla->increments('id');
		$tabla->string('nombre');
		$tabla->string('descripcion');
		$tabla->string('cantidad');
		$tabla->string('precio');
		$tabla->timestamps();
	});

	return 'Tabla products creada';
});

Route::get('registrar', function()
{
	$producto = new Product;
	$producto->nombre = "Smartphone";
	$producto->descripcion = "Samsung Galaxy s4";
	$producto->cantidad = "50";
	$producto->precio = "500USD";

	// Guardamos
	$producto->save();

	return 'El producto fue agregado.';
});
