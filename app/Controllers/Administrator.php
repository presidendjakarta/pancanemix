<?php 
namespace App\Controllers;


class Administrator extends AdminController
{
	
	public function index()
	{
		$this->data['title']	= 'Administrator';
		$this->data['page'] 	= 'home';
		echo view('template/view_admin',$this->data);
	}
}

