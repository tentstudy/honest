<?php 
	/**
	* 
	*/
	class SiteController
	{
		
		function __construct()
		{
			# code...
		}

		public function index()
		{
			$data = [];
			view('site/pages/index',$data);
		}

		// public function login()
		// {
		// 	$data = [];
		// 	$data['name']= 'nguyenducthanh';
		// 	view('site/pages/login',$data);
		// }

		public function logout()
		{
			$data = [];
			view('site/pages/logout',$data);
		}

		public function forgot()
		{
			$data = [];
			view('site/pages/forgot',$data);
		}
	}
 ?>