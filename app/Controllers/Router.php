<?php namespace App\Controllers;
use \RouterOS\Client;
use \RouterOS\Config;
use App\Models\Routers;


class Router extends UsersController
{
	public function data()
	{
		$this->data['title']	= 'Data Router';
		$this->data['title2']	= 'Router';
		$this->data['page'] 	= 'router/data';
		$this->data['js']		= ['assets/libs/sweetalert2/dist/sweetalert2.all.min.js','custom/js/router/data.js'
								 ];
		echo view('template/view_admin',$this->data);
	}

	public function load($value='')
	{
		if (!$this->request->isAJAX())
        {
           return view('errors/custom/404');
        }
		$router = new Routers();
		$this->data['router']	= $router->where(['users_id'=>$this->sess['id']])->findAll();

		echo view('template/ajax/router/data',$this->data);
	}

	public function check_connection()
	{
		if (!$this->request->isAJAX())
        {
           return view('errors/custom/404');
        }
		$name =  _clean($this->request->getPost('name_router'));
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

		try {
			$mik	= new Client($config);
			return 'success';
		} catch (\Exception $e) {
			die('error');
		}
	}

	public function save()
	{
		if (!$this->request->isAJAX())
        {
           return view('errors/custom/404');
        }
		$name =  _clean($this->request->getPost('name_router'));
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


		try {
			$mik	= new Client($config);
			$data =[
				'users_id'	=> $this->sess['id'],
			    'name_router' => $name,
			    'ip_router' => $ip,
			    'username' => $username,
			    'password' => $password,
			    'port_router' => (int)$port
			];

			$router = new Routers();
			$x = $router->insert($data);
			return 'success';

		} catch (\Exception $e) {
			die('error');
		}
	}
	public function chose_session($id='')
	{
		if (!$this->request->isAJAX())
        {
           return view('errors/custom/404');
        }
		$router = new Routers();
		$x = $router->where(['users_id'	=> $this->sess['id'],'id'=>$id])->first();
		if ($x) {
			$ip 		= $x['ip_router'];
			$port 		= $x['port_router'];
			$username	= $x['username'];
			$password	= $x['password'];

			$config = new \RouterOS\Config([
			    'host' => $ip,
			    'user' => $username,
			    'pass' => $password,
			    'port' => (int)$port,
			]);

			try {
				$mik	= new Client($config);
				$this->sess_set->set('router_id',$id);
				return 'success';
			} catch (\Exception $e) {
				return 'failed';
			}

		}else{
			return 'failed';
		}
	}
}