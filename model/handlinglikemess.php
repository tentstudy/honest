<?php 
	require_once __DIR__ .'/connect.php';
	$id = $_POST['id'];
	$query = "select time, content, favorite from messages where id = {$id}";
	$result = $db->query($query);
	$favorite=1;
	$message = $result->fetch_assoc();
	$time = $message['time'];
	$content = $message['content'];
	if($message['favorite']==1)
	{
		$favorite=0;
	}

	$query ="update messages set favorite = {$favorite} where id = {$id}";
	if($db->query($query))
	{
		echo json_encode([
    		'success' => true,
    		'id' => $id,
    		'favorite' => $favorite,
    		'time' => $time,
    		'content' => $content
    	]);
	}
	else{
		echo json_encode([
    		'success' => false,
    		'message' => "error"
    	]);
	}
	
	
 ?>