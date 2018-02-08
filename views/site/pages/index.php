<?php 
  session_start();  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php in('site/elements/css'); 
          in('site/elements/css-index');
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
      <div class="clear" style="clear: both;"></div>
      <div class="content" style="min-height: 100vh">
        <div class="row-1 col-10">
          <span>Get honest feedback from your coworkers and friends</span>
        </div>
        <div class="row-2 col-10">
          <div class="col-6">
            <h4>At work</h4>
            <ul>
              <li>Enhance your areas of strength</li>
              <li>Strengthen Areas for Improvement</li>
            </ul>
          </div>
          <div class="col-6">
            <h4>With Your Friends</h4>
            <ul>
              <li>Improve your friendship by discovering your strengths and areas for improvement</li>
              <li>Let your friends be honest with you</li>
            </ul>
          </div>
        </div>
        <div class="row-3 col-10">
          <div class="col-12">
            <a href="/register">Register</a>
            |
            <a href="/login">Login</a>
          </div>
        </div>
      </div>
      <?php 
        in('site/elements/footer');
      ?>
    </div>

  </body>
</html>