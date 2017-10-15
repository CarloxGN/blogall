<body onunload="javascript:closeSession()">
  <div class="header" <?php if(isset($_GET['tag'])) echo 'style = "display:none"';?>>
    <div class="msg"><?php
  include ('includes/reports.php');
  ?></div>
  <div class="wrap">
  <div class="logo">
    <a href="<?=WEBSITEPATH;?>index.php"><img src="<?php
    if(defined('DATABASE')){
      echo WEBSITEPATH.'images/logo.png';
    }else{
      echo WEBSITEPATH.'images/logo_blog_all.png';
    }
    ?>" title="<?php
    if(!defined('DATABASE')){
      echo 'BlogAll';
    }else{
      echo $_SESSION['name_site'];
    }
    ?>" /></a>

  </div>
  <div class="nav-icon">
     <a href="#" class="right_bt" id="activator"><span> </span> </a>
  </div>
   <div class="box" id="box">
     <div class="box_content">
      <div class="box_content_center">
        <div class="form_content">
          <div class="menu_box_list">
            <ul>
              <li><a href="<?=WEBSITEPATH;?>?pg=start"><span>Blog</span></a></li>
              <?php
                if (isset($_SESSION['id_level'])){
                  echo '<li><a href="'.WEBSITEPATH.'?pg=account"><span>Account info</a></span></li>';
                  if($_SESSION['id_level']  >= 0 && $_SESSION['id_level'] < 2){
                      echo '<li><a href="'.WEBSITEPATH.'?pg=blogsadmin">Blogs Admin</a></li>';
                  }else{
                    echo '<li><a href="'.WEBSITEPATH.'?pg=commentsadmin">Comments Admin</a></li>';
                  }
                  if($_SESSION['id_level'] == 0){
                    echo '<li><a href="'.WEBSITEPATH.'?pg=admin"><span>Admin</span></a></li>';
                  }
                }else{
                  echo '<li><a href="'.WEBSITEPATH.'?pg=login"><span>Login</span></a></li>';
                }
              ?>
              <li><a href="<?=WEBSITEPATH;?>?pg=contact"><span>Contact</span></a></li>
            </ul>
            <div class="clear"> </div>
          </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a class="boxclose" id="boxclose"> <span> </span></a>
        </div>
      </div>
    </div>
  </div>
  <div class="top-searchbar">
  <form action="<?=WEBSITEPATH;?>?pg=listblogs" method="post">
    <input type="text" name="q" placeholder="Only letters or numbers..."/><input type="submit" name="searchblog" value="" title="...Search in this blog"/>
  </form>
  </div>
  <div class="userinfo">
    <div class="user">
      <ul>
        <li>
          <div align="center">
          <a href="?pg=account">
            <?php
            if (isset($_SESSION['username'])):
              if(isset($_SESSION['avatar_user'])):
                echo '<img width ="65" src="'.WEBSITEPATH.'images/avatars/'.$_SESSION['avatar_user'].'" ';
              endif;
            else:
              echo '<img src="'.WEBSITEPATH.'images/user-pic.png" ';
            endif;
            ?>
            title="<?php
          if (isset($_SESSION['username'])):
            echo $_SESSION['username'];
          else:
            echo 'Nobody logged in';
          endif;
             ?>" /><br><span style="font-size:10px">
            <?php
            if (isset($_SESSION['username'])):
              echo $_SESSION['username'];
            else:
              echo 'Nobody is logged';
            endif;
               ?>
          </span></a>
          <div style="font-size:11px;font-style: italic;"><a href="?pg=<?php
            if (isset($_SESSION['username'])):
              echo 'logout">Logout';
            else:
              echo 'login">Login';
            endif;
          ?>
        </a></div>
      </div></li>
      </ul>
    </div>
  </div>
  <div class="listblogs">
    <a href="?pg=listblogs">
      List of Published Blogs
    </a>
  </div>
  <div class="clear"> </div>
</div>
</div>
