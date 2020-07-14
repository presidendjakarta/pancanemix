<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Add extends ManageController
{
	use ResponseTrait;
	
	public function view_ppp_profile($value='')
	{
		echo view('template/ajax/ppp/add_profile',$this->data);
	}

	public function view_customer_category($value='')
	{
		echo view('template/ajax/customers/add_category',$this->data);
	}
	public function view_customer($value='')
	{
		echo "hellow";
	}
	public function add_ppp_profile()
	{
		$name_profile = _clean($this->request->getPost('name_profile'));
		$ip = _clean($this->request->getPost('local_address'));
		$upload = (float)_clean($this->request->getPost('upload_speed'));
		$download = (float)_clean($this->request->getPost('download_speed'));

		$cek_profile = $this->mik->query(['/ppp/profile/print',"?name=$name_profile"])->read();

		if (count($cek_profile)>0) {
			return $this->setResponseFormat('json')
    			->respond([
    				'status'=>200,
    				'data'=>[
    					'msg'=>'err_field',
    					'err'=>'profile with the same name already exists',
    					'field'=>'name_profile',
    					'csrf_token'=>csrf_hash()
    				]
    			]);
		}

		if (!filter_var($ip, FILTER_VALIDATE_IP)) {
			return $this->setResponseFormat('json')
    			->respond([
    				'status'=>200,
    				'data'=>[
    					'msg'=>'err_field',
    					'err'=>'must be a valid IPV4 address',
    					'field'=>'local_address',
    					'csrf_token'=>csrf_hash()
    				]
    			]);
		}
		$cek_ip = $this->mik->query(['/ppp/profile/print',"?local-address=$ip"])->read();

		if (count($cek_ip)>0) {
			return $this->setResponseFormat('json')
    			->respond([
    				'status'=>200,
    				'data'=>[
    					'msg'=>'err_field',
    					'err'=>'profile with the same local address already exists',
    					'field'=>'local_address',
    					'csrf_token'=>csrf_hash()
    				]
    			]);
		}

		if (!is_float($upload)) {
			return $this->setResponseFormat('json')
    			->respond([
    				'status'=>200,
    				'data'=>[
    					'msg'=>'err_field',
    					'err'=>'number only.',
    					'field'=>'upload_speed',
    					'csrf_token'=>csrf_hash()
    				]
    			]);
		}

		if (!is_float($download)) {
			return $this->setResponseFormat('json')
    			->respond([
    				'status'=>200,
    				'data'=>[
    					'msg'=>'err_field',
    					'err'=>'number only.',
    					'field'=>'download_speed',
    					'csrf_token'=>csrf_hash()
    				]
    			]);
		}

		$net = preg_replace('~(\d+)\.(\d+)\.(\d+)\.(\d+)~', "$1.$2.$3.0/24", $ip);


		$uploads=$upload.'M';
		$downloads=$download.'M';

		$out_profile = $this->mik->query([
			'/ppp/profile/add', 
			"=name=$name_profile", 
			"=local-address=$ip"])->read();

		$out_queee = $this->mik->query([
			'/queue/simple/add',
			"=name=$name_profile",
			"=target=$net", 
			"=max-limit=$uploads/$downloads", 
			"=parent=CLIENT"
		])->read();


		return $this->setResponseFormat('json')
    			->respond([
    				'status'=>200,
    				'data'=>[
    					'msg'=>'success',
    					'err'=>'successfully added profile data.',
    					'call'=>base_url('get/ppp_profile?success=true'),
    					'csrf_token'=>csrf_hash()
    				]
    			]);





	}

	public function test($value='')
	{
		$name_profile = 'tes spro';
		$ip = '192.168.10.13';
		$net = preg_replace('~(\d+)\.(\d+)\.(\d+)\.(\d+)~', "$1.$2.$3.0/24", $ip);
		$upload = '20.0M';
		$download = '40.0M';
		$out_profile = $this->mik->query([
			'/ppp/profile/add', 
			"=name=$name_profile", 
			"=local-address=$ip"])->read();

		$out_queee = $this->mik->query([
			'/queue/simple/add',
			"=name=$name_profile",
			"=target=$net", 
			"=max-limit=$upload/$download", 
			"=parent=CLIENT"
		])->read();
		print_r($out_queee);

	}
}