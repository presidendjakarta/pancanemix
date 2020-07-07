<?php namespace App\Libraries;


class Session 
{
	private $c;
	public function __construct()
	{
		$this->c = \Config\Services::session();
	}
	public function set()
	{
		return $this->c;
	}
	public function isAdmin()
	{
		if (!$this->c->isLogin) {
			header('Location: '.base_url('auth/logout'));
			exit();
		}
		if ($this->c->akses!='superman') {
			header('Location: '.base_url('auth/logout'));
			exit();
		}
		

		return $this->c->get();
	}


	public function isUsers()
	{
		if (!$this->c->isLogin) {
			header('Location: '.base_url('auth/logout'));
			exit();
		}
		if ($this->c->akses!='users') {
			header('Location: '.base_url('auth/logout'));
			exit();
		}
		

		return $this->c->get();
	}
}