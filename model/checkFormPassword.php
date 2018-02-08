<?php
	require_once __DIR__ .'/connect.php';
	$curpass = $_POST['curpass'];
	$newpass = $_POST['newpass'];
	$confirpass = $_POST['confirpass'];
    session_start();
	// xử lý input
	
    if($curpass =="")
	{
		echo json_encode([
    		'success' => false,
    		'message' => "A value is required."
		]);
    	return;
    }

    if($newpass =="")
	{
		echo json_encode([
    		'success' => false,
    		'message' => "A value is required."
		]);
    	return;
    }

    if($newpass != $confirpass)
    {
    	echo json_encode([
    		'success' => false,
    		'message' => " New password and it's confimation don't match."
    	]);
    	return;
    }
    
    $query = "select password from users where username = '{$_SESSION['user']}' and password = '{$curpass}'";
    $result = $db->query($query);	
    if( $result->num_rows<=0)
    {
    	echo json_encode([
    		'success' => false,
    		'message' => "Incorrect password."
    	]);
    	return;
    }

	// câu lệnh truy vấn

	$query = "update users set password = '{$newpass}' where username = '{$_SESSION['user']}'";
    // echo $query;
	if($db->query($query))
	{
		echo json_encode([
    		'success'=> true,
    		'message' => "Your profile has been successfully updated"
		]);
		return true;
	}
	else{
		echo json_encode([
    		'success'=> false,
    		'message' => "system has been attempted !"
		]);
		return;
	}
 ?>