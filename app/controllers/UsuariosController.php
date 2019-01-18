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

}
