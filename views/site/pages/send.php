<?php
	require_once __DIR__ .'/../../../model/connect.php';
	$db = new Database('localhost','root',"",'honest');
	session_start();
	// đổ dữ liệu vào page
	$username = $_GET['user'];
	$query ="select username,email ,name,photofile from users where username = '{$username}'";
	$result = $db->query($query);
	$name;
	$email;
	$photofile;
	$content;
	if($result->num_rows>0)
	{
		$user=$result->fetch_assoc();
		$name=$user['name'];
		$photofile=$user['photofile'];
		$email = $user['email'];
	}
	if($photofile=="")
    {
        $photofile="../../../avatars/avatar.png";
    }



    

    if(!empty($_POST['send']))
    {
    	$content = $_POST['content'];
    	$query = "INSERT INTO messages (username,email,content,favorite)
		VALUES ('{$username}','{$email}', '{$content}',0)";
		if($db->query($query))
		{
			echo "<script> alert('Gửi thành công !') </script>";
		}
		else{
			echo "<script> alert('Gửi  không thành công !') </script>";	
		}
    }
    // lấy dữ liệu khi submit


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php in('site/elements/css'); 
          in('site/elements/css-send');
    ?>
  </head>
  <body>
    <div class="container">
      <!-- header -->
	    <div class="header" id="head">
	    	<?php in('site/elements/navigation'); ?>
	    	</div>
	    	<!-- end of header -->
	    	<!-- container -->
	    <div class="content">
			<div class="col-12" style="padding-top:50px;">
			    <div class="panel">
			        <div class="panel-body text-center">
			        	<?php echo '<img data-action="zoom" class="profile-img" src="'.$photofile.'">'; ?>
			            
			            <h5 class="panel-title">
			                <span class="text-inherit">
			                    <?php echo $name; ?>
			                </span>
			                <br>  
			            </h5>
			            <div class="text-center">
		                    <form class="form-mess" method="POST" action="">
		                        <div class="row">
		                            <div style="width: 100%">
		                                    <input id="Text" class="textarea textarea-container textari-controll" type="textarea" name="content"></textarea>
		                                <span class="error"></span>
		                            </div>
		                            
		                            <div style="width: 100%">
		                                <input id="Send" class="btn-send" type="submit" value="send" data-loading-text="Loading..." name="send"></input>
		                            </div>
		                        </div>
		                    </form>    
		                </div>
			        </div>
			    </div>
			</div>
    	</div>
    </div>
    <script src="../../../vendor/jquery/jquery.min.js"></script>
    <script src="../../../js/send.js"></script>
	<div class="clear" style="clear: both;"></div>
        <?php 
            in('site/elements/footer');
        ?>
  </body>
</html>