<?php namespace App\Models;

use CodeIgniter\Model;
use App\Models\Users;


class Customers extends Model
{
    protected $table      = 'panca_customers';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
    	'id',
		'password',
		'alamat',
		'no_hp',
		'ip_address',
		'router_id',
		'user_pppoe'
    ];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}


/*




*/