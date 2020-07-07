<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Session;
use CodeIgniter\API\ResponseTrait;
use App\Models\Users;


class Auth extends Controller
{
	use ResponseTrait;
	private $sess;
	public function __construct()
	{
		helper(array('form','mutahz'));
       	$this->sess = new Session();
	}
	public function login()
	{
		echo view('template/view_auth',array('title'=>'Login','pages'=>'login'));
	}

	public function validation()
	{
		if (!$this->request->isAJAX())
        {
           return redirect()->to('login');
        }
        $datax['username'] = _clean($this->request->getPost('username'));
        $datax['password'] = _enc($this->request->getPost('password'));

        $users  = new Users();
    	$query = $users->where($datax)->select(['id','username','email','akses'])->first();
    	if ($query) {
        		$sess_data['isLogin']	= TRUE;
        		$sess_data['id']	= $query['id'];
        		$sess_data['username']	= $query['username'];
        		$sess_data['email']	= $query['email'];
        		$sess_data['akses']	= $query['akses'];
        		if ($query['akses']=='superman') {
        			$redir = '/administrator';
        		}elseif ($query['akses']=='users') {
        			$redir = '/router/data';
        		}else{
        			$redir = '/customer';
        		}
        		$this->sess->set()->set($sess_data);

        	return $this->setResponseFormat('json')
	        			->respond([
	        				'status'=>200,
	        				'data'=>[
	        					'redir'=>$redir,
	        					'msg'=>'success login',
	        					'load'=>'<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
	                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                                        <span aria-hidden="true">×</span>
	                                    </button>
	                                    <strong>Success - </strong>Successfully signed in.
	                                </div>',
	        					'csrf_token'=>csrf_hash()
	        				]
	        			]);
    	}else{
    		return $this->setResponseFormat('json')
	        			->respond([
	        				'status'=>200,
	        				'data'=>[
	        					'msg'=>'user not found',
	        					'load'=>'<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
	                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                                        <span aria-hidden="true">×</span>
	                                    </button>
	                                    <strong>Error - </strong> User not found!
	                                </div>',
	        					'csrf_token'=>csrf_hash()
	        				]
	        			]);
    	}
	}


	public function logout()
	{
		$this->sess->set()->destroy();
		return redirect()->to('login');
	}


	public function buat()
	{
		$data = array(
			'isLogin' => TRUE,
			'akses'=>'superman',
			'nama'	=>'Agus'
		);
		return $this->sess->set()->set($data);
	}
}