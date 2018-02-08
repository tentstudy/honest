<?php
    require_once __DIR__ . '/../../../model/connect.php'; 
    session_start();

    // kiểm tra session
    if(empty($_SESSION['login']))
    {
        header('Location:/logout');
    }

    
    $query = "SELECT username, email,name,photofile FROM users where username ='{$_SESSION['user']}'";
    $result = $db->query($query);
    // tạo link gửi tin nhắn, name link avatar 
    $linkSend=$_SESSION['user'];
    $linkavatar;
    $name;
    if($result->num_rows>0)
    {
        $user = $result->fetch_assoc();
        $name = $user['name'];
        $linkavatar = $user['photofile'];
    }
    //lấy link avatar
    if($linkavatar=="")
    {
        $linkavatar="../../../avatars/avatar.png";
    }
    


    //đổ dữ liệu vào tab-profile


    // đổ dữ liệu vào messeage
    $query = "select id,content,time,favorite from messages  where username='{$_SESSION['user']}'";
    $result = $db->query($query);


 ?>
  <?php
    $messages = [];
    if($result->num_rows>0)
    {
        while($row= $result->fetch_assoc())
        {
            $messages[] = $row;
        }
    }
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>indiviual message</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
         <?php 
            in('site/elements/css');
            in('site/elements/css-messages');
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
                <div class="container-message">
                    <!-- PROFILE -->
                    <div class="tab-profile col-12">
                        <div class="info">
                            <div class="profile-picture">
                                <?php echo '<img src="'.$linkavatar.'" alt="profile picture" class="avatar">'; ?>
                                <a href="" class="profile-setting">
                                    <h5><img src="/icons/setting.png" alt="" class="icon-setting"><?php echo $name; ?></h5>
                                </a>

                                <a href="http://honest.devv/send?user=<?php echo $linkSend ?>" class="link-mes"><h5 class="link-sent-meseage">http://honest.devv/send?user=<?php echo $linkSend ?></h5></a>
                            </div>
                            <div class="user-name" style="font-size:x-large">
                            </div>
                        </div>
                    </div>
                    <!-- END OF PROFILE -->

                    <!-- warning -->
                    <div class="tab-warning col-10 offset-col-1"> 
                    </div>
                    <!-- end of warning -->

                    <!-- mecosages -->
                    <div class="tab-messages col-12">
                        <div class="mid-mes">
                            <div class="tab-item">
                                <p class="title-mes text-center">Messages
                                </p>
                                <ul class="nav-row-list text-center">
                                    <li class="col-6 reseved">Reseved</li>
                                    <li class="col-6 favorites">Favorites</li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-message">
                                    <?php
                                    foreach ($messages as $key => $row) {
                                        if($row['favorite']==0)
                                            {
                                               echo ('<div class="content-mes" name="'.$row['id'].'" >
                                                <span class="mes">'.$row["content"].'</span>
                                                <span class="delete ass" name="'.$row['id'].'">×</span>
                                                <div class="time">
                                                    <span class="date-time">'.$row['time'].'</span>
                                                    <i class="fa fa-send-o" style="font-size:14px" title="send" id="'.$row['id'].'"></i>
                                                </div>
                                                <i class="fa fa-heart h-b heart-mess " style="font-size:12px" name="'.$row['id'].'"></i>
                                                </div>'); 
                                            } 
                                    }
                                 ?>
                                </div>
                                <div class="tab-favorite">
                                   <?php
                                    foreach ($messages as $key => $row) {
                                        if($row['favorite']==1)
                                            {
                                               echo ('<div class="content-mes" name="'.$row['id'].'" >
                                                <span class="mes">'.$row["content"].'</span>
                                                <span class="delete ass" name="'.$row['id'].'">×</span>
                                                <div class="time">
                                                    <span class="date-time">'.$row['time'].'</span>
                                                </div>
                                                <i class="fa fa-heart h-b heart-favorite" style="font-size:12px" name="'.$row['id'].'"></i>
                                                </div>'); 
                                            } 
                                    }
                                 ?>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <!-- end of meages -->
                </div>
            </div>          
        </div>
        <div class="clear" style="clear: both;"></div>
        <?php 
            in('site/elements/footer');
        ?>
        <script src="../../../vendor/jquery/jquery.min.js"></script>
        <script src="../../../js/messages.js"></script>
    </body>
</html>