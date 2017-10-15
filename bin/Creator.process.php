<?php
class Creator{
  private $database_name;
  private $name_user;
  private $email_user;
  private $pass_user;
  private $sex_user;
  private $web_user;
  private $facebook_user;
  private $twitter_user;
  private $google_user;
  private $linkedin_user;
  private $avatar_user;
  private $salt_user;

  private $file;

  public function newInstallation(){

       if($username != htmlentities($username)){
         return 4;
         exit;
       }

       if (strlen($username)<4){
         return 5;
         exit;
       }

       if (isset($_POST['sex'])){
         $sex = filter_input(INPUT_POST, 'sex', $filter = FILTER_SANITIZE_STRING);
         $sex = htmlentities ($sex);
       }else{
         $sex = 0;
       }

       if (isset($_POST['web'])){
         $web = filter_input(INPUT_POST, 'web', $filter = FILTER_SANITIZE_STRING);
         $web = htmlentities ($web);
       }else{
         $web = 'none';
       }

       if (isset($_POST['facebook'])){
         $facebook = filter_input(INPUT_POST, 'facebook', $filter = FILTER_SANITIZE_STRING);
         $facebook = htmlentities ($facebook);
       }else{
         $facebook = 'none';
       }

       if (isset($_POST['twitter'])){
         $twitter = filter_input(INPUT_POST, 'twitter', $filter = FILTER_SANITIZE_STRING);
         $twitter = htmlentities ($twitter);
       }else{
         $twitter = 'none';
       }

       if (isset($_POST['google'])){
         $google = filter_input(INPUT_POST, 'google', $filter = FILTER_SANITIZE_STRING);
         $google = htmlentities ($google);
       }else{
         $google = 'none';
       }

       if (isset($_POST['linkedin'])){
         $linkedin = filter_input(INPUT_POST, 'linkedin', $filter = FILTER_SANITIZE_STRING);
         $linkedin = htmlentities ($linkedin);
       }else{
         $linkedin = 'none';
       }

       if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
         return 6;
         exit;
       }

       $password = filter_input(INPUT_POST, 'pass', $filter = FILTER_SANITIZE_STRING);
       $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
       $password = hash('sha512', $password . $random_salt);

       if (strlen($password) != 128){
           return 7;
           exit;
       }

       if (is_file($_FILES['avatar']['tmp_name'])){
         $noavatar = 0;
         $avatar = time().'_'.rand(10,1000);
         if ($_FILES['avatar']['error'] > 0){
           return 8;
           exit;
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
             if ($weight > 50000){
               return 10;
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
                 return 11;
                 exit;
             }
             $avatar = $avatar.$ext;
             $add= 'images/avatars/'.$avatar;
         }
       }else{
           $noavatar = 1;
           switch ($sex):
             case 0:
               $avatar = 'male.png';
               break;
             case 1:
               $avatar = 'female.png';
               break;
           endswitch;
         }

   $newconn = new controllerDBInstaller();
   $result = $newconn->connectDB($database_host,	$admin_name, $admin_password);
   if($result==true){
     $data = $newconn->createDB($database_name);
     if($data==true){
       $result = $newconn->createTables($database_name, $id_site, $name_site, $slogan_site, $welcome_site, $maintext_site, $contact_site, $facebook_site, $google_site, $linkedin_site, $youtube_site, $about_site, $logo_site, $name_user, $email_user, $pass_user, $sex_user, $web_user, $facebook_user, $twitter_user, $google_user, $linkedin_user, $avatar_user, $salt_user, 0, 1);

       if($result==true){
         if($noavatar == 0){
           if($uploadedfileload != false){
             if(move_uploaded_file ($_FILES['avatar']['tmp_name'], $add)){
               //include 'bin/registration_email.php';
               return 3;
               exit;
             }else{
               return 12;
             }
           }else{
               return 13;
           }
         }else{
           return 3;
         }
       }else{
          return 4;
          exit;
       }
     }else{
       return 2;
       exit;
     }
   }else{
     return 1;
     exit;
   }
  }
} //end class Creator
