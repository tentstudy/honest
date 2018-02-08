<?php
    session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Aboutus</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php 
            in('site/elements/css');
            in('site/elements/css-about');
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
            <!-- end of header -->

            <!-- content -->
            <div class="content" style="min-height: 100vh">
                <div class="row">
                    <div class="col12">
                        <div class="our-team">
                            <div class="space-content">
                                <h3 style="text-align:center;">Thành viên chính</h3>
                                <div class="member">
                                    <div class="employee col3">
                                        <div class="member-profile">
                                            <img class="avatar" src="../images/anhthanh.jpg" alt="image">
                                            <span class="team">Nhóm trưởng</span>
                                        </div>
                                        <div class="contact-face">
                                            <img src="/icons/FB.png" alt="image">
                                            <h4>Nguyễn Đức Thành</h4>
                                        </div>    
                                    </div>    
                                    
                                    <div class="employee col3">
                                        <div class="member-profile">
                                            <img class="avatar" src="../images/anhthanh.jpg" alt="image">
                                            <span class="team">Nhóm trưởng</span>
                                        </div>
                                        <div class="contact-face">
                                            <img src="/icons/FB.png" alt="image">
                                            <h4>Nguyễn Đức Thành</h4>
                                        </div>    
                                    </div> 

                                    <div class="employee col3">
                                        <div class="member-profile">
                                            <img class="avatar" src="../images/anhthanh.jpg" alt="image">
                                            <span class="team">Nhóm trưởng</span>
                                        </div>
                                        <div class="contact-face">
                                            <img src="/icons/FB.png" alt="image">
                                            <h4>Nguyễn Đức Thành</h4>
                                        </div>    
                                    </div> 

                                    <div class="employee col3">
                                        <div class="member-profile">
                                            <img class="avatar" src="../images/anhthanh.jpg" alt="image">
                                            <span class="team">Nhóm trưởng</span>
                                        </div>
                                        <div class="contact-face">
                                            <img src="/icons/FB.png" alt="image">
                                            <h4>Nguyễn Đức Thành</h4>
                                        </div>    
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of content -->
        </div>
        <div class="clear" style="clear: both;"></div>
        <?php 
            in('site/elements/footer');
        ?>
        
    </body>
    
</html>