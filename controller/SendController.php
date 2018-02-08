<?php
	require_once __DIR__ .'/../model/connect.php';
	class SendController
	{

		
		function __construct()
		{
			# code...
		}
		public function index()
		{
			$db = new Database('localhost','root',"",'honest');
			$user = '';
			if(!empty($_GET['user'])){
				$user = $_GET['user'];
			}
			// check database
			$query ="select username from users where username ='{$user}'";
			$result = $db->query($query);
			if($result->num_rows>0)
			{
				$data = ['user' => $user];
				view('site/pages/send', $data);
			}
			else{
				view('site/pages/404');
			}
			
			
		}
	}
 ?>