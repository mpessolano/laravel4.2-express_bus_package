<?php

class HolaController extends BaseController {

	public function getIndex()
	{
		return Mensaje::men('Hola Marianna');	
	}

}