<?php
$msg = '';
if (isset(
          $_POST['name'],
          $_POST['email'],
          $_POST['confirmemail'],
          $_POST['sex'],
          $_POST['singlebutton'])){

    $username = filter_input(INPUT_POST, 'name', $filter = FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', $filter = FILTER_SANITIZE_EMAIL);
    $confirmemail = filter_input(INPUT_POST, 'confirmemail', $filter = FILTER_SANITIZE_STRING);
    $sex = filter_input(INPUT_POST, 'sex', $filter = FILTER_SANITIZE_STRING);

    if($username != htmlentities($username)){
      header ('Location:?pg=account&er=8');
      die();
    }

    if (strlen($username) < 4){
      header ('Location: ?pg=account&er=17');
      die();
    }else{
      if ($username != $_SESSION['username']){
        $username_upd = $username;
      }else {
        $username_upd = $_SESSION['username'];
      }
    }

    if (isset($_POST['sex']) && ($_POST['sex'] == 0 || $_POST['sex'] == 1)){
      $sex = filter_input(INPUT_POST, 'sex', $filter = FILTER_SANITIZE_STRING);
      $sex_upd = htmlentities ($sex);
    }else{
      $sex_upd = $_SESSION['sex_user'];
    }

    if ($sex_upd != $_SESSION['sex_user']) $upd_avatar = true;

    if (isset($_POST['web'])){
      $web = filter_input(INPUT_POST, 'web', $filter = FILTER_SANITIZE_STRING);
      $web_upd = htmlentities ($web);
    }else{
      $web_upd = $_SESSION['web_user'];
    }

    if (isset($_POST['facebook'])){
      $facebook = filter_input(INPUT_POST, 'facebook', $filter = FILTER_SANITIZE_STRING);
      $facebook_upd = htmlentities ($facebook);
    }else{
      $facebook_upd = $_SESSION['facebook_user'];
    }

    if (isset($_POST['twitter'])){
      $twitter = filter_input(INPUT_POST, 'twitter', $filter = FILTER_SANITIZE_STRING);
      $twitter_upd = htmlentities ($twitter);
    }else{
      $twitter_upd = $_SESSION['twitter_user'];
    }

    if (isset($_POST['google'])){
      $google = filter_input(INPUT_POST, 'google', $filter = FILTER_SANITIZE_STRING);
      $google_upd = htmlentities ($google);
    }else{
      $google_upd = $_SESSION['google_user'];
    }

    if (isset($_POST['linkedin'])){
      $linkedin = filter_input(INPUT_POST, 'linkedin', $filter = FILTER_SANITIZE_STRING);
      $linkedin_upd = htmlentities ($linkedin);
    }else{
      $linkedin_upd = $_SESSION['linkedin_user'];
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      header ('Location: ?pg=account&er=2');
      die();
    }else{
      if ($email != $confirmemail){
        header ('Location: ?pg=account&er=10');
        die();
      }else{
        if($email != $_SESSION['email_user']){
          $email_upd = $email;
        }else{
          $email_upd = $_SESSION['email_user'];
        }
      }
    }
    $password_upd='';
    $random_salt_upd='';
    $upd_pass = false;
    if ($_POST['pass'] !=''){
      if($_POST['pass'] != $_POST['confirmpwd']){
        header ('Location: ?pg=account&er=11');
        die();
      }else{
        $pass = filter_input(INPUT_POST, 'pass', $filter = FILTER_SANITIZE_STRING);
        $random_salt_upd = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
        $password_upd = hash('sha512', $password . $random_salt_upd);
        if (strlen($password_upd) != 128){
          header ('Location: ?pg=account&er=3');
          die();
        }
        $upd_pass = true;
      }
    }

    $log = new controllerLogin();
    $checkname = $log->validateNameUpdate($username_upd);
    if ($checkname == 1){
      header ('Location: ?pg=account&er=16');
      die();
    }

    $checkmail = $log->validateEmailUpdate($email_upd);
    if ($checkmail == 1){
      header ('Location: ?pg=account&er=9');
      die();
    }

    if (is_file($_FILES['avatar']['tmp_name'])){
      $noavatar = 0;
      $avatar_upd = time().'_'.rand(10,1000);
      if ($_FILES['avatar']['error'] !=0){
    		header ('Location: ?pg=account&er=12');
        die();
      }else{
    		//Module upload file
    			$image     = $_FILES['avatar'];
    			$tipo      = $_FILES['avatar']['type'];
    			$weight    = $_FILES['avatar']['size'];
    			$temporal  = $_FILES['avatar']['tmp_name'];
    			$size      = getimagesize($_FILES['avatar']['tmp_name']);
    			$width     = $size[0];
    			$high      = $size[1];
    			$uploadedfileload=true;
    			$msg='';
    			if ($weight > 50000){
    			  $msg.= "File is bigger than 50KB, please reduce it / ";
    			  $uploadedfileload = false;
    			}
          switch($_FILES['avatar']['type']){
            case 'image/jpeg':
              $ext = '.jpg';
            break;
            case 'image/gif':
              $ext = '.gif';
            break;
            case 'image/bmp':
              $ext = '.bmp';
            break;
            case 'image/png':
              $ext = '.png';
            break;
            default:
              $msg.= "Format file not accepted. Only jpg/png/bmp/gif / ";
              $uploadedfileload = false;
            break;
          }
          $avatar_upd = $avatar_upd.$ext;
          $add= 'images/avatars/'.$avatar_upd;
    			if($uploadedfileload == false){
    			 header ('Location: ?pg=account&er=12&msg='.$msg);
           die();
          }
      }
    }else{
      $noavatar = 1;
      if (isset($upd_avatar) && $upd_avatar == true):
        switch ($_SESSION['avatar_user']):
          case 'female.png':
            $avatar_upd = 'male.png';
            break;
          case 'male.png':
            $avatar_upd = 'female.png';
            break;
        endswitch;
      else:
        $avatar_upd = $_SESSION['avatar_user'];
      endif;
    }

    $upduser = new controllerUsers();
    $result = $upduser->updateUser($username_upd,	$email_upd, $password_upd, $sex_upd, $web_upd, $facebook_upd, $twitter_upd,	$google_upd, $linkedin_upd,  $avatar_upd, $random_salt_upd, 1, 2, $upd_pass, $_SESSION['user_id']);

    if ($result==true){
      if($noavatar == 0){
          if($uploadedfileload != false){
              if(move_uploaded_file ($_FILES['avatar']['tmp_name'], $add)){
                unlink('images/avatars/'.$_SESSION['avatar_user']);
                $msg .= 'File succesfully uploaded';
              }else{
                  header ('Location: ?pg=account&er=13');
              }
          }else{
              header ('Location: ?pg=account&msg='.$msg.'&er=12');
          }
      }
      header ('Location: ?pg=account&msg='.$msg.'&suc=4');
    }else{
      header ('Location: ?pg=account&er=5');
    }
}
