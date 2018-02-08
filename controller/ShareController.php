<?php 
	/**
	* 
	*/
	class ShareController
	{
		
		function __construct()
		{
			# code...
		}
		public function index()
		{
			$data = ['id' => $_GET['id']];
			return view('site/pages/share', $data);
		}
	}
 ?>