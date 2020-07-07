<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Session;

class UsersController extends Controller
{
	protected $helpers = ['url','form','mutahz'];
	protected $sess;
	protected $data;
	protected $sess_set;

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

		



	}
}