<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<?php 
		in('site/elements/css');
		in('site/elements/css-forgot');
	 ?>
</head>
<body>
	<div class="container">
		<div class="header">
			<?php 
				in('site/elements/navigation');
			 ?>
		</div>
		<div class="content">
			<div class="text-center">
				<h4>Forgot PassWord</h4>
			</div>
			<div class="form">
				<div class="panel">
					<form action="">
						<h5 class="text-center">Enter your Email</h5>
						
						<input type="text" class="form-control">
						<div class="form-group text-center">
							<button type="submit" class="btn">Send</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php 
				in('site/elements/footer');
			 ?>
		</div>
	</div>
</body>
</html>