<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Customers extends ManageController
{
	public function users()
	{
		$this->data['title']	= 'Users';
		$this->data['title2']	= 'Customers';
		$this->data['page'] 	= 'pages';
		$this->data['button_add'] = button_add('Add Customers','Add Customers','add/view_customer');
		$this->data['target']	= base_url('/get/customers');
		$this->data['css']		= [
		];
		$this->data['js']		= [
			'custom/js/ip/data.js'
		];
		echo view('template/view_admin',$this->data);
	}

	public function category($value='')
	{
		$this->data['title']	= 'Category';
		$this->data['title2']	= 'Customers';
		$this->data['page'] 	= 'pages';
		$this->data['button_add'] = button_add('Add Category','Add Category','add/view_customer_category');
		$this->data['target']	= base_url('/get/customers_category');
		$this->data['css']		= [
		];
		$this->data['js']		= [
			'custom/js/ip/data.js'
		];
		echo view('template/view_admin',$this->data);
	}
}