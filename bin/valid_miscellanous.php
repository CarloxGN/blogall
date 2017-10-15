<?php
  $name = isset($_POST['name']) ? trim(filter_input(INPUT_POST, 'name', $filter = FILTER_SANITIZE_STRING)) : "";
  $slogan = isset($_POST['slogan']) ? trim(filter_input(INPUT_POST, 'slogan', $filter = FILTER_SANITIZE_STRING)) : "";
  $welcome = isset($_POST['welcome']) ? trim(filter_input(INPUT_POST, 'welcome', $filter = FILTER_SANITIZE_STRING)) : "";
  $maintext = isset($_POST['maintext']) ? trim(filter_input(INPUT_POST, 'maintext', $filter = FILTER_SANITIZE_STRING)) : "";
  $email = isset($_POST['email']) ? trim(filter_input(INPUT_POST, 'email', $filter = FILTER_SANITIZE_EMAIL)) : "";
  $about = isset($_POST['about']) ? trim(filter_input(INPUT_POST, 'about', $filter = FILTER_SANITIZE_STRING)) : $name;
  $facebook = isset($_POST['facebook']) ? trim(filter_input(INPUT_POST, 'facebook', $filter = FILTER_SANITIZE_STRING)) : "none";
  $google = isset($_POST['google']) ? trim(filter_input(INPUT_POST, 'google', $filter = FILTER_SANITIZE_STRING)) : "none";
  $linkedin = isset($_POST['linkedin']) ? trim(filter_input(INPUT_POST, 'linkedin', $filter = FILTER_SANITIZE_STRING)) : "none";
  $youtube = isset($_POST['youtube']) ? trim(filter_input(INPUT_POST, 'youtube', $filter = FILTER_SANITIZE_STRING)) : "none";
  $keywords = isset($_POST['keywords']) ? trim(filter_input(INPUT_POST, 'keywords', $filter = FILTER_SANITIZE_STRING)) : "none";

  if(!isset($name)){
      echo '<div class="alert alert-danger">ATTENTION: Blog site`s name is required</div>';
  }else{
    if(!isset($slogan)){
        echo '<div class="alert alert-danger">ATTENTION: Blog site`s Slogan is required</div>';
    }else{
     if(!isset($welcome)){
         echo '<div class="alert alert-danger">ATTENTION: Blog site`s "Welcome message" is required</div>';
     }else{
       if(!isset($maintext)){
         echo '<div class="alert alert-danger">ATTENTION: Blog site`s "Maintext" is required</div>';
       }else{
         if(!isset($email)){
           echo '<div class="alert alert-danger">ATTENTION: Blog site`s "contact email" is required</div>';
         }else{
           if(!isset($about)){
             echo '<div class="alert alert-danger">ATTENTION: Blog site`s "about info" is required</div>';
           }else{
             include 'bin/upload.logo.process.php';
             include 'bin/img.evaluator.process.php';
             $flag = 1;
             if(is_file($_FILES['logo']['tmp_name'])){
               $result1 = upload_image('logo', 51200, 250, 150);
               $img1 = img_evaluator($result1, 'logo');
               if($img1 == 1){
                 $flag = 1;
               }else{
                 echo $img1;
                 $flag = 0;
               }
             }

             if(is_file($_FILES['fav-icon']['tmp_name']) && $flag == 1){
               $result2 = upload_image('fav-icon', 6000, 15, 15);
               $img2 = img_evaluator($result2, 'fav-icon');
               if ($img2 == 1){
                 $flag = 1;
               }else{
                 echo $img2;
                 $flag = 0;
               }
             }
              if ($flag == 1){
                include 'class/DBInstaller.class.php';
                $install = new controllerDBInstaller();
                $data = $install->createDB($_SESSION['database_host'], $_SESSION['database_username'], $_SESSION['database_password'], $_SESSION['database_name']);
                if ($data == 1){
                  $_SESSION['name']     = $name;
                  $_SESSION['slogan']   = $slogan;
                  $_SESSION['welcome']  = $welcome;
                  $_SESSION['maintext'] = $maintext;
                  $_SESSION['email']    = $email;
                  $_SESSION['facebook'] = $facebook;
                  $_SESSION['google']   = $google;
                  $_SESSION['linkedin'] = $linkedin;
                  $_SESSION['youtube']  = $youtube;
                  $_SESSION['about']    = $about;
                  $_SESSION['keywords'] = $keywords;
                  if ($_POST['register']=="Register it"){
                    echo "<script>window.location.href='?pg=installer&step=5';</script>";
                  }else{
                    echo "<script>window.location.href='?pg=admin&suc=9';</script>";
                  }
                 }else{
                   if ($_POST['register']=="Register it"){
                     echo '<div class="alert alert-danger">ATTENTION: Error modifying Database "'.$_SESSION['database_name'].'"</div>';
                   }else{
                     echo "<script>window.location.href='?pg=installer&er=31';</script>";
                   }
                 }
               }
             }
           }
         }
       }
     }
   }
