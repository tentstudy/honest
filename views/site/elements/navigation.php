<div class="navigation">
  <div class="nav-left">
    <div class="logo">
        <a href="#"><img src="../../../images/Honest.png" alt="logo"></a>
    </div>
  </div>
  <div class="nav-right">
      <div class="topnav" id="myTopnav">
        <?php
          if(!empty($_SESSION['login']))
          {
              echo '<ul>
              <li class="one"><a href="/messages">My Messeage</a></li>
              <li class="one"><a href="/manager">Setting</a></li>
              <li class="one"><a href="/logout">Logout</a></li>
              <li class="one"><a href="/about-us">About Us</a></li>
              <li class="toggle"><div   class="nav-toggle" onclick="myFunction()">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div></li>
            </ul>';
          }
          else{
            echo '<ul>
              <li class="one"><a href="/register">Register</a></li>
              <li class="one"><a href="/login">Login</a></li>
              <li class="one"><a href="/about-us">About Us</a></li>
              <li class="toggle"><div   class="nav-toggle" onclick="myFunction()">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div></li>
            </ul>';
          } 
        ?>
      </div>
  </div>
  
  <div class="clear"></div>
</div>
<script src="../../../js/navagation.js"></script>