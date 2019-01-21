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
	$producto->nombre = "Smart TV";
	$producto->descripcion = "Samsung Smart TV";
	$producto->cantidad = "70";
	$producto->precio = "650USD";

	// Guardamos
	$producto->save();

	return 'El producto fue agregado.';
});

// Buscar producto
Route::get('buscar', function()
{
	// Buscar por ID del producto
	//$producto = Product::find(1);
	//return 'El nombre del producto es: '.$producto->nombre;

	$producto = Product::where('nombre', '=', 'Smartphone')->get(); // Devuelve un array

	return 'La cantidad de productos es: '.$producto[0]['cantidad'];
});

// Actualizar producto
Route::get('actualizar', function()
{
	$producto = Product::find(2);
	$producto->cantidad = "30";
	$producto->precio = "230USD";
	$producto->save();

	return 'El producto fue actualizado';
});

// Eliminar un producto
Route::get('eliminar', function()
{
	$producto = Product::find(3);
	$producto->delete();

	return 'El producto fue eliminado';
});
