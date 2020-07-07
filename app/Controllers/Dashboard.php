<?php namespace App\Controllers;


class Dashboard extends ManageController
{
	public function index()
	{
		$this->data['title']	= 'Administrator';
		$this->data['page'] 	= 'users/dashboard';
		$this->data['css']		= [
			'assets/libs/chartist/dist/chartist.min.css',
			'dist/js/pages/chartist/chartist-init.css',
			'assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css'
		];
		$this->data['js']		= [
			'assets/libs/chartist/dist/chartist.min.js',
			'assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js',
			'custom/js/dashboard.js'
		];
		echo view('template/view_admin',$this->data);
	}
}

/*
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../../dist/js/pages/chartist/chartist-init.css" rel="stylesheet">
    <link href="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">

       <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
*/