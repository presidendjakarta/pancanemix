<?php namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
    protected $table      = 'panca_category';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'router_id', 'profile_id', 'name', 'upload', 'download', 'harga'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}