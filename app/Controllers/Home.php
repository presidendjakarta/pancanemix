<?php namespace App\Controllers;
use \RouterOS\Client;
use \RouterOS\Query;
use \RouterOS\Config;



class Home extends BaseController
{

	public function index()
	{
		echo view('home_');
	}



	// public function index()
	// {
	// 	header('Content-Type: application/json');
	// 	$config = (new Config())
	// 		        ->set('host', '10.100.10.1')
	// 		        ->set('user', 'admin')
	// 		        ->set('pass', 'xnxx');

	// 	$client = new Client($config);
	// 	$x = $client->query('/ip/address/print')->read();
	// 	echo json_encode($x);
	// }

	//--------------------------------------------------------------------

}
