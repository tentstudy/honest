<?php
  require_once __DIR__ .'/../../../model/connect.php' ;
  session_start();
  $query = "select email,name from users where username='{$_SESSION['user']}'";
  $result = $db->query($query);
  $email;
  $username;
  $name;
  if($result->num_rows>0)
  {
    $user = $result->fetch_assoc();
    $email = $user['email'];
    $name = $user['name'];
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
      in('site/elements/css-setting');
     ?>
  </head>
  <body>
    <div class="container">
      <!-- header -->
      <div class="header" id="head">
        <?php 
          in('site/elements/navigation');
         ?>
      </div>
      <!-- end header -->
      <!-- content -->
      <div class="content" style="min-height: 100vh">
        <?php 
          in('site/elements/list-item-setting');
        ?>
        <!-- Personal information -->
        <div class="personal-information">
          <div class="growl growl-static dis-none" style="width: 100%">
              <div class="alert alert-dismissable" role="alert">
                  
              </div>
              <span class="close">×</span>  
          </div>


          <div class="panel">
            <form action="" method="POST">
              <h4>Exit Personal Information</h4>
              <hr>
              <div class="mr-t"></div>

              <div class="form-group">
                <label class="col-3 control-label"for="name">Name </label>
                <div class="col-9">
                    <input class="form-control" type="text" id="name" name="name" <?php echo 'value="'.$name.'"'; ?>>
                    <span class="warning warning-name"></span>
                </div>
            </div>
              <!--  -->
              <div class="form-group">
                  <label class="col-3 control-label" for="email" >Email </label>
                  <div class="col-9">
                      <input class="form-control" type="text" id="email" name="email" <?php echo 'value="'.$email.'"'; ?> >
                      <span class="warning warning-emails"></span>
                  </div>
              </div>
              <!-- -->
              <div class="form-group">
                  <label class="col-3 control-label" for="photoURL">Photo (optional)</label>
                  <div class="col-9">
                      <input class="form-control" type="file" id="photofile" name="photofile">
                  </div>
              </div> 
              
              <div class="form-group">
                <div class="col-12 save">
                    <button id="save">Save</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="clear"></div>
        <!-- end Personal information -->
      </div>
    </div>
    <div class="clear" style="clear: both;"></div>
        <?php 
            in('site/elements/footer');
        ?>
    <script src="../../../vendor/jquery/jquery.min.js"></script>
    <script src="../../../js/manager.js"></script>
  </body>
</html>
