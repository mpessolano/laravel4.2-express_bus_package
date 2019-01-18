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
/*
Route::get('/', function()
{
	return View::make('hello');
});
*/

// Llamar al controlador y accion mostrar index
Route::get('/', 'EjemploControlador@mostrarIndex');
// Llamar al controlador y accion mostrar mensaje
Route::get('mensaje', 'EjemploControlador@mostrarMensaje');
// Llamar al controlador y accion mostrar nombre
Route::get('nombre/{nombre}', 'EjemploControlador@mostrarNombre');