<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\Customers;
use App\Models\Category;

class Get extends ManageController
{
	use ResponseTrait;
	public function sys_()
	{
		$router = $this->mik->query('/system/routerboard/print')->read()[0];
		$clock = $this->mik->query('/system/clock/print')->read()[0];
		$resource = $this->mik->query('/system/resource/print')->read()[0];

		$date = str_replace('/', '-', $clock['date'].' '.$clock['time']);
		return $this->setResponseFormat('json')
	        			->respond([
	        				'status'=>200,
	        				'data'=>[
	        					'routerboard'=>$router['routerboard'],
								'board'=>$router['board-name'],
								'model'=>$router['model'],
								'firmware'=>$router['current-firmware'],
								'date'=>date('d M Y H:i:s',strtotime($date)),
								'timezone'=>$clock['time-zone-name'],
								'ram'=>size_convert($resource['free-memory'],FALSE),
								'cpu'=>$resource['cpu-load'],
								'uptime'=>$resource['uptime'],
								'version'=>'Router OS : '.$resource['version'],
								'hdd'=>size_convert($resource['free-hdd-space'],FALSE)
	        				]
	        			]);
	}
	public function address($value='')
	{
		$address = $this->mik->query('/ip/address/print')->read();
		$keys = array_column($address, 'interface');
    	array_multisort($keys, SORT_ASC, $address);
		$this->data['address'] = $address;
		// echo json_encode($this->data['address']);
		echo view('template/ajax/ip/address',$this->data);
	}
	public function ppp_profile($value='')
	{
		$data = $this->mik->query('/ppp/profile/print')->read();
		$keys = array_column($data, 'name');
    	array_multisort($keys, SORT_ASC, $data);
		$this->data['data'] = $data;
		$this->data['data_q'] = $this->mik->query(['/queue/simple/print',"?parent=CLIENT"])->read();

		// echo json_encode($this->data['data']);
		echo view('template/ajax/ppp/profile',$this->data);

	}
	public function ppp_pppoe_server($value='')
	{
		$data = $this->mik->query('/interface/pppoe-server/server/print')->read();
		$this->data['data'] = $data;
		echo view('template/ajax/ppp/pppoe_server',$this->data);
	}
	public function ppp_pppoe_secret($value='')
	{
		$data = $this->mik->query('/ppp/secret/print')->read();
		$this->data['data'] = $data;
		// echo json_encode($this->data['data']);
		echo view('template/ajax/ppp/pppoe_secret',$this->data);
	}

	public function customers($value='')
	{
		$data_q = $this->mik->query('/queue/simple/print')->read();
		$data_s = $this->mik->query('/ppp/secret/print')->read();

		
		$cs = new Customers();
		$data_cs = $cs->where('router_id',$this->sess['router_id'])->findAll();

		$this->data['data'] = $data_cs;
		$this->data['data_q'] = $data_q;
		$this->data['data_s'] = $data_s;


		echo view('template/ajax/customers/users',$this->data);
	}

	public function customers_category($value='')
	{
		$data = $this->mik->query('/ppp/profile/print')->read();
		$keys = array_column($data, 'name');
		$ct   = new Category();
		// $data_ct = $ct->where('router_id',$this->sess['router_id'])->findAll();
    	array_multisort($keys, SORT_ASC, $data);
		$this->data['data'] = $data;
		$this->data['ct'] = $ct;
		echo view('template/ajax/customers/category',$this->data);
		echo get_js(['custom/js/modal.js']);
	}
}