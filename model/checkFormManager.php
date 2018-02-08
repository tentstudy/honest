<?php

	session_start();
	require_once __DIR__ .'/connect.php';
	define('MB_2', 1000 * 1000 * 2);
	// ham Random
	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	
	$email= $_POST['email'];
	$name = $_POST['name'];


	// kiểm tra xem ảnh đã được chọn chưa
	$avatar= null;
	if( !empty($_FILES["avatar"])){
		$avatar = $_FILES["avatar"];
	}

	// lay thong tin cu cua user
	$query ="select email,photofile from users where username = '{$_SESSION['user']}'";
	$result = $db->query($query);
	$user = $result->fetch_assoc();
	$lastemail = $user['email'];
	$path = $user['photofile'];
	// xử lý input
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
	// nếu avatar = null thì sẽ không kiểm tra avatar và không cập nhật.
	if(!empty($avatar))
	{
		$filename = $randStr.basename($avatar["name"]);
		$newpath = "../avatars/" . $filename;
		$path=$newpath;
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
	    		'message' => "file đã tồn tại."
	    	]);
	    	return;
		}

		if ($avatar["size"] > MB_2) {
			echo json_encode([
	    		'success' => false,
	    		'message' => "ảnh phải nhỏ hơn 2 MB"
	    	]);
	    	return;
		}

		$extensions = array("jpg", "png", "jpeg", "gif");
		if(!in_array($extension, $extensions)){
			echo json_encode([
	    		'success' => false,
	    		'message' => "chỉ chấp nhận JPG, JPEG, PNG & GIF."
	    	]);
	    	return;
		}
		// upload anh
		move_uploaded_file($avatar["tmp_name"],$path);
	}
		//nếu email đã tồn tại thì không cập nhật email nữa
	if($email==$lastemail)
	{
		$query="UPDATE users SET name='{$name}',photofile='{$path}' WHERE username='{$_SESSION['user']}' ";
		if($db->query($query))
		{
			
			echo json_encode([
	    		'success'=> true,
	    		'message' => "Your profile has been successfully updated"
			]);
			return;
		}
		else{
			echo json_encode([
	    		'success'=> false,
	    		'message' => "system has been attempted !"
			]);
			return;
		}
	}
		// nếu email chưa được đăng ký thì kiểm tra nó đã được đăng ký trước đó chưa ? , nếu chưa thì sẽ cho cập nhật
	else{
		$query = "select email from users";
		$result = $db->query($query);
		while($row = $result->fetch_assoc()) {
			if($email==$row['email'])
			{
				echo json_encode([
					'success'=>false,
					'message'=>'This e-mail has been previously registered.' 
				]);
				return;
			}
		}
		$username = explode('@', $email)[0];
		$query="UPDATE users SET username='{$username}', email='{$email}',name='{$name}',photofile='{$path}' WHERE username='{$_SESSION['user']}' ";
		$querymess = "UPDATE messages SET username = '{$username}',email='{$email}' where username ='{$_SESSION['user']}'";
		if(($db->query($query) && $db->query($querymess)))
		{
			$_SESSION['user']=$username;
			echo json_encode([
	    		'success'=> true,
	    		'message' => "Your profile has been successfully updated"
			]);
			return;
		}
		else{
			echo json_encode([
	    		'success'=> false,
	    		'message' => "system has been attempted !"
			]);
			return;
		}
	}
	
 ?>