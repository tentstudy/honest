
<?php
    session_start();
    require_once __DIR__ . '/../../../model/connect.php';
    // if(!empty($_POST['register']))
    // {
    //     $query = "select User from user";
    //     $result = $db->query($query);
    //     $email = $_POST['email'];
    //     if($result->num_rows>0)
    //     {
    //        while($row = $result->fetch_assoc())
    //        {
    //         if($email == $row['User'])
    //         {

    //         }
    //        } 
    //     }
        
    // }
    
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
        in('site/elements/css');
        in('site/elements/css-register');
     ?>
  </head>
  <body>
    <div class="container">
        <!-- header -->
        <div class="header" id="head">
        <?php
            in('site/elements/navigation');
        ?>
        <!-- end of header -->
        <!-- content -->
        </div>
        <div class="content">
            <div class="text-center"><h3>Register</h3></div>
            <div class="form">
                <div class="panel">
                    <div class="panel-body">
                        <div class="content-middel">
                            <form action="" method="POST"  class="m-w-f" onsubmit="return checkForm()">
                                <div class="form-group">
                                    <label class="col-3 control-label" for="email" >Email </label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" id="email" name="email">
                                        <span class="warning warning-email"></span>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="form-group">
                                    <label class="col-3 control-label" for="password">Password</label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" id="password" name="password">
                                        <span class="warning warning-password"></span>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="form-group">
                                    <label class="col-3 control-label" for="confirmpassword" >Password Confirmation </label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" id="confirmpassword" name="confirmpassword">
                                        <span class="warning warning-confirmpassword"></span>
                                    </div>
                                </div>
                                <!--  -->
                                
                                <!-- -->
                                <div class="form-group">
                                    <label class="col-3 control-label"for="name">Name </label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" id="name" name="name">
                                        <span class="warning warning-name"></span>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="form-group">
                                    <label class="col-3 control-label" for="birthdate">Birth Date</label>
                                    <div class="col-9">
                                        <input class="form-control" type="date" name="birthdate" id="birthdate" name="birth">
                                    </div>
                                </div>
                                <!--  -->
                                <div class="form-group">
                                    <label class="col-3 control-label" for="gender">Gender </label>
                                    <div class="col-9">
                                        <select class="form-control" name="gender" id="gender" name="gender">
                                        <option value="oth" selected>_</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="form-group">
                                    <label class="col-3 control-label" for="country">Country </label>
                                    <div class="col-9">
                                        <select class="form-control" name="country" id="country">
                                        <option value="Vietnamese" selected>Viet Nam</option>
                                        <option value="Korea">Korea</option>
                                        <option value="China">China</option>
                                        <option value="ThaiLand">ThaiLand</option>
                                        <option value="American">American</option>
                                        <option value="Other">_</option>
                                    </select>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="form-group">
                                        <label class="col-3 control-label" for="photoURL">Photo (optional)</label>
                                        <div class="col-9">
                                            <input class="form-control" type="file" id="photofile" name="photofile">
                                        </div>
                                </div> 
                               

                                <div class=" register form-group">
                                   <div class="col-5"></div>
                                    <input class="m-a" type="submit" name="register"  id="register" value="Register">
                                   
                                </div>
                                
                                <!-- <div class="login-face form-group">
                                    <input type="button" name="loginFB" value="Login With Facebook">
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
            <?php 
            in('site/elements/footer');
         ?>   
        </div>
      <!-- <div class="footer"></div> -->

    </div>
    <script src="../../../vendor//jquery/jquery.min.js"></script>
    <script src="../../../js/register.js"></script>

        
    </body>
    </html>