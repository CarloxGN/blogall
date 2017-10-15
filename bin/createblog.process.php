<?php
include_once 'bin/htmlentitiesinvert.php';
if(!isset($_POST['title']) || !isset($_POST['subtitle']) || !isset($_POST['body'])){
  echo '<div class="alert alert-danger">Incomplete information 1</div>';
  exit;
}
$_SESSION['title_blog_active'] = trim(filter_input(INPUT_POST, 'title', $filter = FILTER_SANITIZE_STRING));
$_SESSION['subtitle_blog_active'] = trim(filter_input(INPUT_POST, 'subtitle', $filter = FILTER_SANITIZE_STRING));
$_SESSION['body_blog_active'] = trim($_POST['body']);
$id_theme = trim(filter_input(INPUT_POST, 'theme', $filter = FILTER_VALIDATE_INT));
$type_media_blog = trim(filter_input(INPUT_POST, 'type_media_blog', $filter = FILTER_SANITIZE_STRING));
$uploadedfileload = false;
$msg=' ';
switch($type_media_blog){
  case 'image':
    $uploadedfileload = true;
    if(!is_file($_FILES['image']['tmp_name'])){
        echo '<div class="alert alert-danger">Error in type of image</div>';
        exit;
    }else{
      $media_blog = time().'_'.rand(10,1000);
      if ($_FILES['image']['error'] !=0){
        echo '<div class="alert alert-danger">Error in type of image</div>';
        exit;
      }else{
          //Module upload file
          $image     = $_FILES['image'];
          $type      = $_FILES['image']['type'];
          $weight    = $_FILES['image']['size'];
          $temporal  = $_FILES['image']['tmp_name'];
          $size      = getimagesize($_FILES['image']['tmp_name']);
          $width     = $size[0];
          $high      = $size[1];
          $uploadedfileload=true;
          $msg='';
          if ($weight > 2560000){
            echo '<div class="alert alert-danger">File is bigger than 2.5 MB, please reduce it</div>';
            exit;
          }
          if ($width > 1600 || $high > 1200){
            echo '<div class="alert alert-danger">File exceed max. size (1600x1200), please reduce it</div>';
            exit;
          }
        switch($type){
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
            echo '<div class="alert alert-danger">Format file not accepted. Only jpg/png/bmp/gif</div>';
            die();
            break;
        }
        $media_blog = $media_blog.$ext;
        $add = WEBSITEPATH.'images/blogmedia/'.$media_blog;
      }
    }
    break;
  case 'video':
    if(!isset($_POST['video'])){
      echo '<div class="alert alert-danger">Please complete the video link`s input</div>';
    }else{
      $media_blog = trim(filter_input(INPUT_POST, 'video', $filter = FILTER_SANITIZE_STRING));
    }
    break;
  default:
    echo "<script>window.location.href ='?pg=start&er=5';</script>";
    exit;
    break;
}

$createblog = new controllerBlogs();
$result = $createblog->createBlog($_SESSION['title_blog_active'],$_SESSION['subtitle_blog_active'],	$media_blog,	$_SESSION['user_id'],	$id_theme,	1,	$_SESSION['body_blog_active'],	0,	0,	$type_media_blog);

if ($result == true){
  if($uploadedfileload != false && $type_media_blog=='image'){
    if(move_uploaded_file ($_FILES['image_media_blog']['tmp_name'], $add)){
      $msg .= ' / File succesfully uploaded';
    }else{
      echo "<script>window.location.href ='?pg=blogsadmin&er=13';</script>";
    }
  }
  echo "<script>window.location.href ='?pg=blogsadmin&suc=6&msg='.$msg.';</script>";
  exit;
}else{
  echo "<script>window.location.href ='?pg=blogsadmin&er=5';</script>";
  exit;
}
