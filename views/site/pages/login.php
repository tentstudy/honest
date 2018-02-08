<?php

  require_once __DIR__ . '/../../../model/connect.php';
  // khởi động sesion
  session_start(); 
  //kiểm tra email và passwrod rỗng hay không
  if(!empty($_POST['btnSubmit']))
  {
    if(!empty($_POST['email']) && !empty($_POST['password']))
    {
      $query = "SELECT username,email FROM users where email='{$_POST['email']}' and password='{$_POST['password']}'";
      $result = $db->query($query);
      if($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['login']=true;
        $_SESSION['user']=$user['username'];
        header('Location:/messages');
      }
      else {
        echo "<script> alert('Sai tên đăng nhập hoặc mật khẩu !') </script>";
      }
    }
    else{
      echo "<script> alert('Têm đăng nhập và mật khẩu không được rỗng!') </script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
      in('site/elements/css'); 
      in('site/elements/css-login'); ?>
  </head>
  <body>
    <div class="container">
      <div class="header" id="head">
        <?php
          in('site/elements/navigation');
        ?>
      </div>
      
      <div class="content" style="min-height: 100vh">
        <div class="text-center"><h3>Login</h3></div>
         <!-- col-6 offset-col-3 -->
        <div class="form">
          <div class="panel">
            <div class="panel-body text-center">
              <div class="content-middel">
                <form action="#" method="POST" class="text-center m-r-a">
                  <div class="form-group">
                    <input type="text" placeholder="Email or emailname" id="email" class="form-control" name="email">
                  </div> 

                  <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control" name="password">
                  </div>
                  <div class="row">
                    <div class="col-6 p-t-9">
                      <input type="checkbox" id="checkbox1">
                      <label for="checkbox1" class="control-label-check">Remember me</label>
                    </div>
                    <div class="col-6">
                      <input type="submit" name="btnSubmit" value="Login">
                    </div>
                  </div>
                  <div class="forgot text-center"><a  href="#">Forgot My Password</a></div>
                </form>
              </div>
            </div>
          </div>
        </div>                  
      </div>               
    </div>

    <div class="clear" style="clear: both;"></div>
        <?php 
            in('site/elements/footer');
    ?>

  </body>
</html>