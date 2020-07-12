<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Customers extends ManageController
{
	public function users()
	{
		$this->data['title']	= 'Users';
		$this->data['title2']	= 'Customers';
		$this->data['page'] 	= 'customers/users';
		$this->data['css']		= [
		];
		$this->data['js']		= [
			'custom/js/ip/data.js'
		];
		echo view('template/view_admin',$this->data);
	}
}