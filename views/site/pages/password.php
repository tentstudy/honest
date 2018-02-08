<?php 
  session_start();
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
        <!-- Change Password -->
        <div class="change-password">
          <div class="growl growl-static" style="width: 100%">
            <div class="alert alert-dismissable" role="alert">                
            </div>
            <span class="close">×</span>  
          </div>


          <div class="panel">
            <form action="" method="POST" onsubmit="return checkFormPassword()">
              <h4>Change Password</h4>
              <hr>
              <div class="mr-t"></div>
              <div class="form-group">
                <label class="col-3 control-label" for="currentPasswork" >Current Password </label>
                <div class="col-9">
                    <input class="form-control" type="text" id="currentPasswork" name="currentPasswork">
                    <span class="warning warning-currentPasswork"></span>
                </div>
            </div>
            <!--  -->
            <div class="form-group">
                <label class="col-3 control-label" for="newpasswowrd" >New Password</label>
                <div class="col-9">
                    <input class="form-control" type="text" id="newpasswowrd" name="newpasswowrd">
                    <span class="warning warning-newpasswowrd"></span>
                </div>
            </div>
            <!--  -->
              <div class="form-group">
                <label class="col-3 control-label" for="confirmation">New Password Confirmation</label>
                <div class="col-9">
                    <input class="form-control" type="text" id="confirmation" name="confirmation">
                    <span class="warning warning-confirmation"></span>
                </div>
            </div>
            <!--  -->
            <div class="form-group">
              <div class="col-12 change">
                  <button type="submit" name="change" id="change" >Change</button>
              </div>
            </div>
            </form>
          </div>
        </div>
 <!-- End Change Password -->
      </div>
    </div>
    <div class="clear" style="clear: both;"></div>
        <?php 
            in('site/elements/footer');
        ?>
    <script src="../../../vendor/jquery/jquery.min.js"></script>
    <script src="../../../js/password.js"></script>
  </body>
</html>
