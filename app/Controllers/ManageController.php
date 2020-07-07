<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Session;
use \RouterOS\Client;
use \RouterOS\Config;
use \RouterOS\Query;
use App\Models\Routers;

class ManageController extends Controller
{
	protected $helpers = ['url','form','mutahz'];
	protected $sess;
	protected $data;
	protected $sess_set;
	protected $mik;
	public function __construct()
	{
       	$c = new Session();
        $this->sess = $c->isUsers();
        $this->sess_set = $c->set();
	}

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{

		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		$this->data['sess'] = $this->sess;

		// if (!$this->request->isAJAX())
  //       {
  //          die(view('errors/custom/404'));
  //       }

		// check router_id 
		if (empty($this->sess['router_id'])) {
			die(header('Location: '.base_url('router/data')));
		}



		$router = new Routers();
		$x = $router->where(['users_id'	=> $this->sess['id'],'id'=>$this->sess['router_id']])->first();

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
			$this->mik	= new Client($config);
		} catch (\Exception $e) {
			$this->sess_set->remove('router_id');
			die(header('Location: '.base_url('router/data')));
		}

		if (!$x) {
			$this->sess_set->remove('router_id');
			die(header('Location: '.base_url('router/data')));
		}





		



	}
}