<?php

class UsuariosController extends BaseController
{
	// Metodo se ejecuta por defecto primero Index
	public function getIndex()
	{
		return 'Aqui podemos listar a los usuarios de la Base de Datos: ';
	}

	// Metodo para mostrar un formulario de registro
	public function getRegistrar()
	{
		// Desplegamos un formulario basico
		echo 'Aqui podemos registrar a los usuarios: <br>';
		echo Form::open(array('url' => 'usuarios/crear', 'method' => 'post'));
		echo Form::label('name', 'Nombre: ');
		echo Form::text('nombre');
		echo Form::submit('Registrar');
		echo Form::close();
	}

	// Metodo para registrar y mostrar el usuario
	public function postCrear()
	{
		// Recibimos la variable enviada por el formulario con el metodo post
		$nombre = Input::get('nombre');
		return 'Usuario Registrado: '.$nombre;
	}

	// Metodo para mostrar el perfil del usuario
	public function getPerfil()
	{
		return 'Aqui podemos mostrar el perfil del usuario: ';
	}

	public function getVista1()
	{
		//return View::make('vista1')->with('nombre', 'Marianna');
		// Redireccionar a la vista 2
		return Redirect::to('usuarios/vista2')->with('mensaje', 'error al acceder');
	}

	public function getVista2()
	{
		return View::make('vista2', array('nombre'=>'Marianna', 'apellido'=>'Pessolano', 'telefono'=>'78451257'));
	}

}
