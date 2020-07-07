<?php namespace App\Controllers;
use \RouterOS\Client;
use \RouterOS\Config;

class Router extends UsersController
{
	public function data()
	{
		$this->data['title']	= 'Router';
		$this->data['title2']	= 'Data';
		$this->data['page'] 	= 'router/data';
		$this->data['js']		= ['custom/js/router/data.js'
								 ];
		echo view('template/view_admin',$this->data);
	}

	public function check_connection()
	{
		if (!$this->request->isAJAX())
        {
          	return view('errors/custom/404');
        }


		$ip =  _clean($this->request->getPost('router_ip'));
		$port = _clean($this->request->getPost('router_port'));
		$username =  _clean($this->request->getPost('username'));
		$password =  _clean($this->request->getPost('password'));

		$config = new \RouterOS\Config([
		    'host' => $ip,
		    'user' => $username,
		    'pass' => $password,
		    'port' => (int)$port,
		]);

		

		$mik	= new Client($config);
		$print = $mik->query('/system/routerboard/print')->read();
		if (is_array($print)) {
			return 'success';
		}
		
		// var_dump($mik);
		// if ($mik=='Invalid user name or password') {
		// 	return 'fuck';
		// }
		// $client = $mik->query('/system/routerboard/print')->read();

		// var_dump($client);

  //       return 'success';


	}
}