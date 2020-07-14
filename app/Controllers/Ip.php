<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Ip extends ManageController
{
	use ResponseTrait;
	public function address()
	{
		$this->data['title']	= 'Addresses';
		$this->data['title2']	= 'IP';
		$this->data['page'] 	= 'pages';
		$this->data['target']	= base_url('/get/address');
		$this->data['css']		= [
		];
		$this->data['js']		= [
			'custom/js/ip/data.js'
		];
		echo view('template/view_admin',$this->data);
	}
}