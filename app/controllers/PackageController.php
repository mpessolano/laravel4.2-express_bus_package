<?php

class PackageController extends BaseController
{
	public function __construct()
	{
		$this->beforeFilter('auth'); // Bloqueo de acceso
	}
	
	public function getIndex()
	{
		return View::make('package.index');
	}
}