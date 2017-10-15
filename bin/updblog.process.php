<?php
include 'bin/htmlentitiesinvert.php';
$hide_title = filter_input(INPUT_POST, 'hide_title', $filter = FILTER_SANITIZE_STRING);
$title_blog_upd = filter_input(INPUT_POST, 'title_blog', $filter = FILTER_SANITIZE_STRING);
$subtitle_blog_upd = filter_input(INPUT_POST, 'subtitle_blog', $filter = FILTER_SANITIZE_STRING);
$body_blog_upd = $_POST['body_blog'];
$id_theme_upd = filter_input(INPUT_POST, 'id_theme', $filter = FILTER_VALIDATE_INT);
$kind_media_blog_upd = filter_input(INPUT_POST, 'kind_media_blog', $filter = FILTER_SANITIZE_STRING);
if(isset($_POST['media_blog'])) $media_blog_upd = filter_input(INPUT_POST, 'media_blog', $filter = FILTER_SANITIZE_STRING);

$updblog = new controllerBlogs();

$data = $updblog->listBlog($_SESSION['active_blog']);
foreach ($data as $oldblog) {
  $id_user_upd = $oldblog['id_user'];
  if ($id_user_upd != $_SESSION['user_id']){
    header ('Location: ?pg=start&er=27');
    die();
  }
  $status_blog_upd = $oldblog['status_blog'];
  $old_kmb = $oldblog['kind_media_blog'];
  $old_media_blog = $oldblog['media_blog'];
  $views_blog_upd = $oldblog['views_blog'];
  $likes_blog_upd = $oldblog['likes_blog'];
  $register_blog_upd = $oldblog['register_blog'];
}

switch($kind_media_blog_upd){
  case 'same':
    $kind_media_blog_upd = $old_kmb;
    $media_blog_upd = $old_media_blog;
    break;
  case 'image':
    $uploadedfileload = true;
    if(!is_file($_FILES['image_media_blog']['tmp_name'])){
        header ('Location: ?pg=editblog&er=12&id='.$_SESSION['active_blog'].'&title='.$hide_title);
        die();
    }else{
      $media_blog_upd = time().'_'.rand(10,1000);
      if ($_FILES['image_media_blog']['error'] !=0){
        header ('Location: ?pg=editblog&er=12&id='.$_SESSION['active_blog'].'&title='.$hide_title);
        die();
      }else{
          //Module upload file
          $image     = $_FILES['image_media_blog'];
          $type      = $_FILES['image_media_blog']['type'];
          $weight    = $_FILES['image_media_blog']['size'];
          $temporal  = $_FILES['image_media_blog']['tmp_name'];
          $size      = getimagesize($_FILES['image_media_blog']['tmp_name']);
          $width     = $size[0];
          $high      = $size[1];
          $uploadedfileload=true;
          $msg='';

          if ($weight > 2560000){
            $msg.= "File is bigger than 2.5 MB, please reduce it";
            header ('Location: ?pg=editblog&er=12&id='.$_SESSION['active_blog'].'&title='.$hide_title.'&msg='.$msg);
            die();
          }
          if ($width>1600 || $high>1200){
            $msg.= "File exceed max. size (1600x1200), please reduce it";
            header ('Location: ?pg=editblog&er=12&id='.$_SESSION['active_blog'].'&title='.$hide_title.'&msg='.$msg);
            die();
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
            $msg.= "Format file not accepted. Only jpg/png/bmp/gif / ";
            header ('Location: ?pg=editblog&er=12&id='.$_SESSION['active_blog'].'&title='.$hide_title.'&msg='.$msg);
            $uploadedfileload = false;
            break;
        }
        $media_blog_upd = $media_blog_upd.$ext;
        $add= 'images/blogmedia/'.$media_blog_upd;
        if($uploadedfileload == false){
          header ('Location: ?pg=editblog&er=12&id='.$_SESSION['active_blog'].'&title='.$hide_title.'&msg='.$msg);
          die();
        }
      }
    }
    break;
  case 'video':
    if(!isset($media_blog_upd)) header ('Location:  ?pg=editblog&er=26&id='.$_SESSION['active_blog'].'&title='.$hide_title);
    break;
  default:
    header ('Location: ?pg=start&er=x');
    die();
    break;
}

$result = $updblog->updateBlog($id_user_upd, $id_theme_upd, $status_blog_upd, $kind_media_blog_upd, $media_blog_upd, $title_blog_upd, $subtitle_blog_upd, $body_blog_upd, $views_blog_upd, $likes_blog_upd, $register_blog_upd, $_SESSION['active_blog']);
if ($result == true){
  if($uploadedfileload != false){
    if(move_uploaded_file ($_FILES['image_media_blog']['tmp_name'], $add)){
      unlink('images/blogmedia/'.$old_media_blog);
      $msg .= ' / File succesfully uploaded';
    }else{
      header ('Location: ?pg=editblog&er=13');
    }
  }
  header ('Location: ?pg=editblog&msg='.$msg.'&suc=6&id='.$_SESSION['active_blog'].'&title='.$title_blog_upd);
  die();
}else{
  header ('Location: ?pg=editblog&er=5');
  die();
}
