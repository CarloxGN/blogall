<?php
if (isset($_SESSION['misc'])) {
  header('Location: index.php');
  exit;
}
function step_5(){
  if (isset($_GET['eri'])){
     include 'install/install_reports.php';
    }

  if (isset($_POST['singlebutton']) && $_POST['singlebutton']=="Register") {
    include 'bin/register.process.php';
    if ($flag==1){
      $_SESSION['id_level'] = 0;
      $_SESSION['status_user'] = 1;
      include 'class/DBInstaller.class.php';
      $install = new controllerDBInstaller();
      $data = $install->createTables(
        $_SESSION['database_host'],
        $_SESSION['database_username'],
        $_SESSION['database_password'],
        $_SESSION['database_name'],
        $_SESSION['name'],
        $_SESSION['slogan'],
        $_SESSION['welcome'],
        $_SESSION['maintext'],
        $_SESSION['email'],
        $_SESSION['facebook'],
        $_SESSION['google'],
        $_SESSION['linkedin'],
        $_SESSION['youtube'],
        $_SESSION['about'],
        $_SESSION['keywords'],
        $_SESSION['name_user'],
        $_SESSION['email_user'],
        $_SESSION['pass_user'],
        $_SESSION['sex_user'],
        $_SESSION['web_user'],
        $_SESSION['facebook_user'],
        $_SESSION['twitter_user'],
        $_SESSION['google_user'],
        $_SESSION['linkedin_user'],
        $_SESSION['avatar_user'],
        $_SESSION['salt_user'],
        $_SESSION['id_level'],
        $_SESSION['status_user']
      );
      if ($data==true){
        $_SESSION['finish']='ok';
        echo "<script>window.location.href='?pg=installer&step=6';</script>";
      }else{
        echo "<script>window.location.href='?pg=installer&step=5&eri=10';</script>";
      }
    }
  }
?>
    <form method="post" action="?pg=installer&step=5" class="form-group" onsubmit="return confirm('Do you wish proceed?');" enctype="multipart/form-data">
      <div align="center">
        <h2>
          Webmaster Account:
        </h2>
      </div>
      <?php
        include 'includes/user_register.php';
        echo '<input type="hidden" name="wm" value="1" />';
      ?>
    </form>
  <?php
}
