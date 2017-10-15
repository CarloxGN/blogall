<?php
if (!isset($_POST['name']) || !isset($_POST['slogan']) || !isset($_POST['welcome']) || !isset($_POST['maintext']) || !isset($_POST['email'])){
  header ('Location: ?pg=admin&tab=1&er=18');
  exit;
}

$name     = trim(substr(filter_input(INPUT_POST, 'name', $filter = FILTER_SANITIZE_STRING), 0, 99)));
$slogan   = trim(substr(filter_input(INPUT_POST, 'slogan', $filter = FILTER_SANITIZE_STRING), 0, 149)));
$welcome  = trim(substr(filter_input(INPUT_POST, 'welcome', $filter = FILTER_SANITIZE_STRING), 0, 599)));
$maintext = trim(substr(filter_input(INPUT_POST, 'maintext', $filter = FILTER_SANITIZE_STRING), 0, 499)));
$email    = trim(substr(filter_input(INPUT_POST, 'email', $filter = FILTER_SANITIZE_EMAIL), 0, 39)));
$about    = isset($_POST['about']) ? trim(substr(filter_input(INPUT_POST, 'about', $filter = FILTER_SANITIZE_STRING), 0, 39))) : $name;
$facebook = isset($_POST['facebook']) ? trim(substr(filter_input(INPUT_POST, 'facebook', $filter   = FILTER_SANITIZE_STRING), 0, 49))) : "none";
$google   = isset($_POST['google']) ? trim(substr(filter_input(INPUT_POST, 'google', $filter = FILTER_SANITIZE_STRING), 0, 49))) : "none";
$linkedin = isset($_POST['linkedin']) ? trim(substr(filter_input(INPUT_POST, 'linkedin', $filter   = FILTER_SANITIZE_STRING), 0, 49))) : "none";
$youtube  = isset($_POST['youtube']) ? trim(substr(filter_input(INPUT_POST, 'youtube', $filter = FILTER_SANITIZE_STRING), 0, 49))) : "none";
$keywords = isset($_POST['keywords']) ? trim(substr(filter_input(INPUT_POST, 'keywords', $filter   = FILTER_SANITIZE_STRING), 0, 199))) : "none";

  include 'bin/upload.logo.process.php';
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
    $updmis = new controllerMiscellaneous();
    $data = $updmis->updateMiscellaneous($name, $slogan, $welcome, $maintext, $email, $facebook, $google, $linkedin, $youtube, $about, $keywords);
    if ($data == true){
        header ('Location: ?pg=logout');
    }else{
        echo "<script>window.location.href='?pg=admin&tab=2&er=35';</script>";
    }
  }
