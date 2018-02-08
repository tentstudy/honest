<?php
	/**
	* 
	*/
	function view($path, $data = [])
	{
		extract($data);
		require_once __DIR__ . "/views/{$path}.php";
	}
	function in($path)
	{
		$path = __DIR__ . "/views/{$path}.php";
		if(file_exists($path))
			require_once $path;
	}
	class Route
	{
		
		function __construct()
		{
		}
		public static function get($route, $action)
		{
			//cat tu /
			$request = trim($_GET['r'], '/');
			if($route != $request) return;
			// chia thanh 2 chuoi tu @
			$action = explode('@', $action);
			$controller = $action[0];
			$method = $action[1];
			require_once __DIR__ . "/controller/{$controller}.php";
			$c = new $controller();
			$c->{$method}();
		}
	}
	Route::get('','SiteController@index');
	Route::get('register', 'RegisterController@index');
	Route::get('messages','MessagesController@index');
	Route::get('login','LoginController@index');

	Route::get('logout','SiteController@logout');
	Route::get('ForgotPassWord','SiteController@forgot');

	Route::get('about-us','AboutUsController@index');
	Route::get('manager','ManagerController@index');
	Route::get('exit','PersonalSettingController@index');
	Route::get('remove','RemoveController@index');
	Route::get('password','PasswordController@index');
	Route::get('user/profile','SiteController@login');
	Route::get('send','SendController@index');
	Route::get('404','SendController@index');
	Route::get('share', 'ShareController@index');
?>