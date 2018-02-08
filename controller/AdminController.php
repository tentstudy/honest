<?php
	/**
	* 
	*/
	class AdminController
	{
		function __construct()
		{
		}
		public function index()
		{
			$data['name'] = 'socola';
			return view('admin/pages/index', $data);
		}
		
	}
?>