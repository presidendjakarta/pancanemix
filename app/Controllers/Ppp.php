<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Ppp extends ManageController
{
	use ResponseTrait;
	public function profile()
	{
		$this->data['title']	= 'Profile';
		$this->data['title2']	= 'PPP';
		$this->data['page'] 	= 'pages';
		$this->data['button_add'] = button_add('Add Profile','Add Profile','add/view_ppp_profile');
		$this->data['target']	= base_url('/get/ppp_profile');
		$this->data['css']		= [
		];
		$this->data['js']		= [
			'custom/js/jquery.inputmask.bundle.js',
			'custom/js/ip/data.js'
		];
		echo view('template/view_admin',$this->data);
	}
	public function pppoe($value='')
	{
		$this->data['title']	= 'PPPoE Server';
		$this->data['title2']	= 'PPP';
		$this->data['page'] 	= 'pages';
		$this->data['target']	= base_url('/get/ppp_pppoe_server');
		$this->data['css']		= [
		];
		$this->data['js']		= [
			'custom/js/ip/data.js'
		];
		echo view('template/view_admin',$this->data);
	}
	public function secret($value='')
	{
		$this->data['title']	= 'PPPoE Users';
		$this->data['title2']	= 'PPP';
		$this->data['page'] 	= 'pages';
		$this->data['target']	= base_url('/get/ppp_pppoe_secret');
		$this->data['css']		= [
		];
		$this->data['js']		= [
			'custom/js/ip/data.js'
		];
		echo view('template/view_admin',$this->data);
	}
}