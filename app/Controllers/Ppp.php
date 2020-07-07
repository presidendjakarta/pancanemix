<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Ppp extends ManageController
{
	use ResponseTrait;
	public function profile()
	{
		$this->data['title']	= 'Profile';
		$this->data['title2']	= 'PPP';
		$this->data['page'] 	= 'ppp/profile';
		$this->data['css']		= [
		];
		$this->data['js']		= [
			'custom/js/ip/data.js'
		];
		echo view('template/view_admin',$this->data);
	}
	public function pppoe($value='')
	{
		$this->data['title']	= 'PPPoE Server';
		$this->data['title2']	= 'PPP';
		$this->data['page'] 	= 'ppp/pppoe_server';
		$this->data['css']		= [
		];
		$this->data['js']		= [
			'custom/js/ip/data.js'
		];
		echo view('template/view_admin',$this->data);
	}
}