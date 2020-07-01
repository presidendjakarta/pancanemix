<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Auth extends Controller
{
	public function login()
	{
		echo view('auth/login');
	}
}