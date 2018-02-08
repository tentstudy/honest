<?php 
	require_once __DIR__ .'/connect.php';
	$id = $_POST['id'];
	$query = "DELETE FROM messages where id = {$id}";
	if($db->query($query))
	{
		echo json_encode([
    		'success' => true,
    		'message' => "successfuly"
    	]);
	}
	else{
		echo json_encode([
    		'success' => false,
    		'message' => "error"
    	]);
	}
	
	
 ?>