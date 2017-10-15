<?php
if (isset($_SESSION['misc'])) {
  header('Location: index.php');
  exit;
}
session_start();

if(isset($_POST['WEBSITEPATH'])){
  $websitepath = $_POST['WEBSITEPATH'];
  if(substr($websitepath, -1) != '/'){
    $websitepath .='/';
  }
  $_SESSION['WEBSITEPATH'] = $websitepath;
  define('WEBSITEPATH', $websitepath);
}

if (!isset($_SESSION['WEBSITEPATH'])){
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome to BlogAll | Start Installation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/fav-icon.png"  rel="shortcut icon" type="image/x-icon" />
    <link href='https://fonts.googleapis.com/css?family=Michroma' rel='stylesheet' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" type="text/css" media="screen" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- -//End-click-drop-down-menu--- -->

  <style media="screen">
      .centered{
         width: 450px;
         height: 350px;
         position: absolute;
         top: 25%;
         left: 30%;
      }
  </style>
  </head>
  <body>
  <form class="" action="" method="post">
    <div class="centered">
      <div align="center;">
        <img src="images/logo_blog_all.png" alt="">
        <div align="center">
          <br>
        <span style="font-size: 30px;">Welcome to BlogAll</span>
        </div>
        <input type="text" name="WEBSITEPATH" class="form-control input-md col-ms-5 col-md-8" placeholder="i.e.: http://localhost/my_blog/">
        <br><div align="right" style="font-size: 10px; color: red">
          What is your installation path?
        </div>
        <p>&nbsp;</p><p><input type="submit" name="access" value="Start Installation" class="btn btn-info active"></p>
      </div>
    </div>
  </form>
  </body>
</html>
  <?php
}else{
  include_once 'install/step01.php';
  include_once 'install/step02.php';
  include_once 'install/step03.php';
  include_once 'install/step04.php';
  include_once 'install/step05.php';
  include_once 'install/step06.php';

  if (defined('WEBSITEPATH')){
    header ('Location: ?pg=start');
  }else{
    $title = 'Installation Script';
    ?><!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <title>Welcome to BlogAll | Installation Script</title>
      <meta name="keywords" content="">
      <link href="images/fav-icon.png"  rel="shortcut icon" type="image/x-icon" />
      <link href='https://fonts.googleapis.com/css?family=Michroma' rel='stylesheet' />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link href="css/style.css" rel='stylesheet' type='text/css' />
      <link href="css/login.css" rel='stylesheet' type='text/css' />
      <link href="css/main.css" rel="stylesheet" type='text/css' />

      <!----webfonts---->
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" type="text/css" media="screen" />
      <!----//webfonts---->
      <!-- Global CSS for the page and tiles -->
        <!-- //Global CSS for the page and tiles -->
      <!---start-click-drop-down-menu----->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="http://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js" charset="utf-8"></script>
      <script type="text/JavaScript" src="js/sha512.js"></script>
      <script type="text/JavaScript" src="js/forms.js"></script>
      <script type="text/javascript" src="js/updownmenu.js"></script>
      <script src='https://www.google.com/recaptcha/api.js'></script>
      <script src="js/hidediv.js" charset="utf-8"></script>
      <script src="js/closeSession.js" charset="utf-8"></script>
      <script src="plugins/tinymce/tinymce.min.js" charset="utf-8"></script>
      <script src="js/init-tinyMCE.js" charset="utf-8"></script>
      <script type="text/javascript">
      $(document).ready(function(){
          $('#blogtable').DataTable();
      });

      addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
      }, false);

      function hideURLbar(){
        window.scrollTo(0,1);
      }
      </script>
    </head>
      <body onUnload="javascript:closeSession()">
        <div class="header">
          <div class="msg"></div>
        <div class="wrap">
        <div class="logo">
          <a href="index.php"><img src="images/logo_blog_all.png" title="BlogAll"></a>
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
                    <li><a href="?pg=start"><span>Blog</span></a></li>
                    <?php
                      if (isset($_SESSION['id_level'])){
                        echo '<li><a href="?pg=account"><span>Account info</a></span></li>';
                        if($_SESSION['id_level']  >= 0 && $_SESSION['id_level'] < 2){
                            echo '<li><a href="?pg=blogsadmin">Blogs Admin</a></li>';
                        }else{
                          echo '<li><a href="?pg=commentsadmin">Comments Admin</a></li>';
                        }
                        if($_SESSION['id_level'] == 0){
                          echo '<li><a href="?pg=admin"><span>Admin</span></a></li>';
                        }
                      }else{
                        echo '<li><a href="?pg=login"><span>Login</span></a></li>';
                      }
                    ?>
                    <li><a href="?pg=contact"><span>Contact</span></a></li>
                  </ul>
                  <div class="clear"> </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="boxclose" id="boxclose"> <span> </span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="top-searchbar">
      <form action="?pg=listblogs" method="post">
        <input type="text" name="q" placeholder="Only letters or numbers..."/><input type="submit" name="searchblog" value="" title="...Search in this blog"/>
      </form>
      </div>
        <div class="userinfo">
          <div class="user">
            <ul>
              <li>
                <div align="center">
                  <img src="images/user-pic.png"/><br><span>
                  Nobody is logged
                </span><br>
                Installation Stage
              </div>
            </li>
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
    <div>
    <p>&nbsp;</p><p>&nbsp;</p><br>
    </div>
      <div class="content">
        <div class="wrap">
          <div class="contact-info">
            <div class="main">
              <?php
              $step = (isset($_GET['step']) && $_GET['step'] != '') ? $_GET['step'] : '';
              switch($step){
                case '1':
                  step_1();
                  break;
                case '2':
                  step_2();
                  break;
                case '3':
                  step_3();
                  break;
                case '4':
                  step_4();
                  break;
                case '5':
                  step_5();
                  break;
                case '6':
                  step_6();
                  break;
                default:
                  step_1();
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <!----start-footer--->
      <?php include_once 'includes/footer.php' ?>
      <!----//End-footer--->
      <!---//End-wrap---->
      <div class="clear"></div>
      <div class="clear"></div>
      <div class="clear"></div>
    </body>
    </html>
  <?php
  }
}
