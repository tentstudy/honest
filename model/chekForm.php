<?php
// ham Random
	// print_r($_POST);
	// exit();
	define('MB_2', 1000 * 1000 * 2);

	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	require_once __DIR__ .'/connect.php';
	$email= $_POST['email'];
	$username = explode('@', $email)[0];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	$name = $_POST['name'];
	$birthdate = $_POST['birthdate'];
	
	if($_POST['gender']=='male')
	{
		$gender =1;
	}else{
		$gender=0;
	}
	
	$country = $_POST['country'];
	
	// kiểm tra xem ảnh đã được chọn chưa
	$avatar= null;
	if( !empty($_FILES["avatar"])){
		$avatar = $_FILES["avatar"];
	}
	// xử lý input
	$query = "select email from users where email = '{$email}' ";
    $result = $db->query($query);	
    if( $result->num_rows>0)
    {
    	echo json_encode([
    		'success' => false,
    		'message' => "Email already exists."
    	]);
    	return;
    }

    if($password =="")
	{
		echo json_encode([
    		'success' => false,
    		'message' => "password is required."
		]);
    	return;
    }
    if($password != $confirmpassword)
    {
    	echo json_encode([
    		'success' => false,
    		'message' => "Password and it's confimation don't match."
    	]);
    	return;
    }
    if($name =="")
    {
    	echo json_encode([
    		'success' => false,
    		'message' => "name is required."
    	]);
    	return;
    }
    
    

   //xu ly anh
    // $dir = "uploads/";
    $randStr = time().generateRandomString();
	$filename;
	$path;
	if(empty($avatar))
	{
		$filename="";
		$path="";
	}
	else
	{
		$filename = $randStr.basename($avatar["name"]);
		$path = "../avatars/" . $filename;
		$extension = strtolower(pathinfo($path,PATHINFO_EXTENSION));
		$check = getimagesize($avatar["tmp_name"]);

		if(!$check){
			echo json_encode([
	    		'success' => false,
	    		'message' => "file is not image."
	    	]);
	    	return;
		}

		if (file_exists($path)) {
			echo json_encode([
	    		'success' => false,
	    		'message' => "file already exists."
	    	]);
	    	return;
		}

		if ($avatar["size"] > MB_2) {
			echo json_encode([
	    		'success' => false,
	    		'message' => "Images must be less than 2 MB"
	    	]);
	    	return;
		}

		$extensions = array("jpg", "png", "jpeg", "gif");
		if(!in_array($extension, $extensions)){
			echo json_encode([
	    		'success' => false,
	    		'message' => "Only accept JPG, JPEG, PNG & GIF."
	    	]);
	    	return;
		}
		// upload anh
		move_uploaded_file($avatar["tmp_name"],$path);
	} 
	
	// end of xử lý ảnh


	// câu lệnh truy vấn
	$query = "INSERT INTO users (username,email,password,name,birth,gender,country,photofile)
	VALUES ('{$username}','{$email}', '{$password}','{$name}','{$birthdate}',{$gender},'{$country}','{$path}')";
	if($db->query($query))
	{
		
		echo json_encode([
    		'success'=> true,
    		'message' => ""
		]);
	}
	else{
		echo json_encode([
    		'success'=> false,
    		'message' => "Loi cmn roi"
		]);
		return;
	}
 ?>