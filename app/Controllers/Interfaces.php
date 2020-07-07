<?php namespace App\Controllers;
use \RouterOS\Client;
use \RouterOS\Config;

class Interfaces extends UsersController
{
	public function index()
	{
		$this->data['title']	= 'Interface Data';
		$this->data['title2']	= 'Interface';
		$this->data['page'] 	= 'interface/data';
		$this->data['js']		= ['custom/js/router/data.js'];
		echo view('template/view_admin',$this->data);
	}

}