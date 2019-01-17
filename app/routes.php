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
	return View::make('hello');
});

Route::get('holamundo', function() 
{
	return '¡Hola mundo!';
});

Route::get('inicio', function()
{
	return '<html><head><title>Bienvenido al portal</title></head>
		    <body bgcolor="cyan"><center><h1><hr color="white">Portal de Turismo</h1><hr color="white"><br>Bienvenido a la pagina</center></body></html>';
});

// Acepta todos los verbos HTTP
Route::any('hola', function()
{
	return 'Hello World';
});

// Rutas con parametros
Route::get('user/{id}', function($id)
{
	return 'User: '.$id;
});

// Rutas con parametros opcionales
Route::get('user/{name?}', function($name = null)
{
	return $name;
});

// Rutas con parametro por defecto
Route::get('user/{name?}', function($name = 'John')
{
	return $name;
});

// Rutas con expresiones regulares
Route::get('usuario/{name}', function($name)
{
	return $name;
})
->where('name', '[A-Za-z]+');

Route::get('usuario2/{id}', function($id)
{
	return $id;
})
->where('id', '[0-9]+');

// Mostramos un campo de texto en un formulario y enviamos la informacion
Route::get('registro', function()
{
	echo Form::open(array('url' => 'nombre', 'method' => 'post'));
	echo Form::label('nombre', 'Tu nombre: ');
	echo Form::text('nom');
	echo Form::submit('Enviar');
	echo Form::close();
});

// Recibimos la informacion del formulario y la mostramos
Route::post('nombre', function()
{
	$nombre = Input::get('nom');
	return 'Tu nombre es: '.$nombre;
});
