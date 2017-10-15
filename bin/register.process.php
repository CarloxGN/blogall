<?php
$msg = '';
if (isset(
          $_POST['name'],
          $_POST['email_new'],
          $_POST['confirmemail'],
          $_POST['pass'],
          $_POST['confirmpwd'],
          $_POST['sex'],
          $_POST['singlebutton'])){
    $username = filter_input(INPUT_POST, 'name', $filter = FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email_new', $filter = FILTER_SANITIZE_EMAIL);
    $confirmemail = filter_input(INPUT_POST, 'confirmemail', $filter = FILTER_SANITIZE_EMAIL);
    $pass = filter_input(INPUT_POST, 'pass', $filter = FILTER_SANITIZE_STRING);
    $confirmpwd = filter_input(INPUT_POST, 'confirmpwd', $filter = FILTER_SANITIZE_STRING);
    $sex = filter_input(INPUT_POST, 'sex', $filter = FILTER_SANITIZE_STRING);

    if($username != htmlentities($username)){
      if(isset($_SESSION['misc'])){
        header ('Location:?pg=login&er=8');
        exit;
      }else{
        echo "<script>window.location.href='?pg=installer&step=5&eri=1'</script>";
      }
    }

    if (isset($_POST['sex'])){
      $sex = filter_input(INPUT_POST, 'name', $sex = FILTER_SANITIZE_STRING);
      $sex = htmlentities ($sex);
    }else{
      $sex = 0;
    }
    $_SESSION['sex_user'] = $sex;

    if (isset($_POST['web'])){
      $web = filter_input(INPUT_POST, 'web', $filter = FILTER_SANITIZE_STRING);
      $web = htmlentities ($web);
    }else{
      $web = 'none';
    }
    $_SESSION['web_user'] = $web;

    if (isset($_POST['facebook'])){
      $facebook = filter_input(INPUT_POST, 'facebook', $filter = FILTER_SANITIZE_STRING);
      $facebook = htmlentities ($facebook);
    }else{
      $facebook = 'none';
    }
    $_SESSION['facebook_user'] = $facebook;

    if (isset($_POST['twitter'])){
      $twitter = filter_input(INPUT_POST, 'twitter', $filter = FILTER_SANITIZE_STRING);
      $twitter = htmlentities ($twitter);
    }else{
      $twitter = 'none';
    }
    $_SESSION['twitter_user'] = $twitter;

    if (isset($_POST['google'])){
      $google = filter_input(INPUT_POST, 'google', $filter = FILTER_SANITIZE_STRING);
      $google = htmlentities ($google);
    }else{
      $google = 'none';
    }
    $_SESSION['google_user'] = $google;

    if (isset($_POST['linkedin'])){
      $linkedin = filter_input(INPUT_POST, 'linkedin', $filter = FILTER_SANITIZE_STRING);
      $linkedin = htmlentities ($linkedin);
    }else{
      $linkedin = 'none';
    }
    $_SESSION['linkedin_user'] = $linkedin;

    if (strlen($username)<4){
      if(isset($_SESSION['misc'])){
        header ('Location: ?pg=login&name='.$name.'&email='.$email.'&confirmemail='.$confirmemail.'&sex='.$sex.'&er=17');
        exit;
      }else{
        echo "<script>window.location.href='?pg=installer&step=5&eri=2'</script>";
      }
    }
    $_SESSION['name_user'] = $username;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      if(isset($_SESSION['misc'])){
        header ('Location: ?pg=login&name='.$name.'&email='.$email.'&confirmemail='.$confirmemail.'&sex='.$sex.'&er=2');
        exit;
      }else{
        echo "<script>window.location.href='?pg=installer&step=5&eri=3'</script>";
      }
    }

    if ($email != $confirmemail){
      if(isset($_SESSION['misc'])){
        header ('Location: ?pg=login&name='.$name.'&email='.$email.'&confirmemail='.$confirmemail.'&sex='.$sex.'&er=10');
        exit;
      }else{
        echo "<script>window.location.href='?pg=installer&step=5&eri=4'</script>";
      }
    }
    $_SESSION['email_user'] = $email;


    if ($pass != $confirmpwd){
      if(isset($_SESSION['misc'])){
        header ('Location: ?pg=login&name='.$name.'&email='.$email.'&confirmemail='.$confirmemail.'&sex='.$sex.'&er=11');
        exit;
      }else{
        echo "<script>window.location.href='?pg=installer&step=5&eri=5'</script>";
      }
    }

    if(isset($_SESSION['misc'])){
      $log = new controllerLogin();
      $checkname = $log->validateName($username);
      if ($checkname == 1){
        header ('Location: ?pg=login&name='.$name.'&email='.$email.'&confirmemail='.$confirmemail.'&sex='.$sex.'&er=16');
        exit;
      }

      $checkmail = $log->validateEmail($email);
      if ($checkmail == 1){
        header ('Location: ?pg=login&name='.$name.'&email='.$email.'&confirmemail='.$confirmemail.'&sex='.$sex.'&er=9');
        exit;
      }
    }

    $password = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
	if (strlen($password) < 6){
      if(isset($_SESSION['misc'])){
        header ('Location: ?pg=login&name='.$name.'&email='.$email.'&confirmemail='.$confirmemail.'&sex='.$sex.'&er=20');
        exit;
      }else{
        echo "<script>window.location.href='?pg=installer&step=5&eri=11'</script>";
      }
    }
    $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
    $password = hash('sha512', $password . $random_salt);
    $_SESSION['salt_user'] = $random_salt;

    if (strlen($password) != 128){
      if(isset($_SESSION['misc'])){
        header ('Location: ?pg=login&name='.$name.'&email='.$email.'&confirmemail='.$confirmemail.'&sex='.$sex.'&er=3');
        exit;
      }else{
        echo "<script>window.location.href='?pg=installer&step=5&eri=6'</script>";
      }
    }
    $_SESSION['pass_user'] = $password;

    if (is_file($_FILES['avatar']['tmp_name'])){
      $noavatar = 0;
      $avatar = time().'_'.rand(10,1000);
      if ($_FILES['avatar']['error'] > 0){
        if (isset($_SESSION['misc'])){
      		header ('Location: ?pg=login&name='.$name.'&email='.$email.'&confirmemail='.$confirmemail.'&sex='.$sex.'&er=12');
          exit;
        }else{
          echo "<script>window.location.href='?pg=installer&step=5&eri=8'</script>";
        }
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
          $avatar = $avatar.$ext;
          $add= 'images/avatars/'.$avatar;
    			if($uploadedfileload == false){
            if(isset($_SESSION['misc'])){
              header ('Location: ?pg=login&name='.$name.'&email='.$email.'&confirmemail='.$confirmemail.'&sex='.$sex.'&er=12&msg='.$msg);
              exit;
            }else{
              echo "<script>window.location.href='?pg=installer&step=5&eri=7'</script>";
            }
          }
      }
    }else{
        $noavatar=1;
        switch ($sex):
          case 0:
            $avatar = 'male.png';
            break;
          case 1:
            $avatar = 'female.png';
            break;
        endswitch;
    }

    if(isset($_SESSION['misc'])){
      $newuser = new controllerUsers();
      $result = $newuser->createUser($username,	$email, $password, $sex, $web, $facebook, $twitter,	$linkedin, $google, $avatar, $random_salt, 2, 1);

      $checkmail = $log->validateEmail($email);

      if ($checkmail == 1){
        if($noavatar == 0){
          if($uploadedfileload != false){
            if(move_uploaded_file ($_FILES['avatar']['tmp_name'], $add)){
              $msg .= 'File succesfully uploaded';
            }else{
              header ('Location: ?pg=login&name='.$name.'&email='.$email.'&confirmemail='.$confirmemail.'&sex='.$sex.'&er=13');
            }
          }else{
              header ('Location: ?pg=login&msg='.$msg.'&er=12');
          }
        }

        include 'bin/registration_email.php';
        $msg .= 'We are sending you a confirmation email';
        header ('Location: ?pg=login&msg='.$msg.'&suc=2');
      }else{
        header ('Location: ?pg=login&er=15');
        exit;
      }
    }else{
      $_SESSION['avatar_user'] = $avatar;
      $flag=1;
      if($noavatar == 0){
        if($uploadedfileload != false){
          error_reporting(E_ALL ^ E_WARNING);
          if(move_uploaded_file ($_FILES['avatar']['tmp_name'], $add)){
            $flag=1;
          }else{
            $flag=1;
            if (!isset($_SESSION['misc'])){
              echo "<script>window.location.href='?pg=installer&step=5&eri=8'</script>";
            }
          }
        }else{
          if (isset($_SESSION['misc'])){
            header ('Location: ?pg=login&name='.$name.'&email='.$email.'&confirmemail='.$confirmemail.'&sex='.$sex.'&er=13');
          }else{
            echo "<script>window.location.href='?pg=installer&step=5&eri=9'</script>";
          }
        }
      }
    }
  }
