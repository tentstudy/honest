<?php
  require_once __DIR__ . '/../../../model/connect.php'; 
  session_start();
  
  if(!empty($_POST['remove']))
  {
    $queryuser = "DELETE FROM users WHERE username='{$_SESSION['user']}'";
    $querymess = "DELETE FROM messages WHERE username ='{$_SESSION['user']}' ";
    if(($db->query($queryuser)) && ($db->query($querymess)))
    {
      header('Location:/logout');
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
        <!-- remove account-->
         <div class="remove-account">
          <div class="panel">
           <h4>Remove account</h4>
            <hr>
            
            <div class="panel-body">
              <div class="alert-remove">
                <h5>Are you sure that you want to delete your account</h5>
                <h5>deleting  the account is irreversible !</h5>
              </div>
              <form  action="" method="POST">
                <div class="form-group ">
                  <a class="cancel" href="/messages">Cancel</a>
                  <input type="submit" name="remove" id="remove" value="Remove"></button>
                </div>
              </form>
            </div>
          </div> 
        </div>
<!-- end of remove account -->
      </div>
    </div>
    <div class="clear" style="clear: both;"></div>
        <?php 
            in('site/elements/footer');
        ?>
    <script src="../../../vendor/jquery/jquery.min.js"></script>
    <script src="../../../js/remove.js"></script>
  </body>
</html>

