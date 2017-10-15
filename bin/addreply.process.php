<?php
if(!$_SESSION['user_id']){
  header ('Location: index.php?pg=login');
  die();
}

if (!isset($_POST['id_blog'])){
  echo "<script>window.location.href = '?pg=start&er=5';</script>";
  die();
}else{
  $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
  $body = trim(filter_input(INPUT_POST, 'body', FILTER_SANITIZE_STRING));
  $id_blog = filter_input(INPUT_POST, 'id_blog', FILTER_VALIDATE_INT);
  $tag = trim(filter_input(INPUT_POST, 'tag', FILTER_SANITIZE_STRING));
  $_SESSION['active_comment'] = $id_blog;

  if (!isset($title) || strlen($title) < 5){
    echo '<span style="font-weight:bold;color:red;font-size:10px;width:250px">Please write a `Title` longer than 5 characters</span>';
    include 'includes/grid_text_reply.php';
    die();
  }elseif (strlen($title) > 150){
      $title = substr($title,0,150);
      echo '<span style="font-weight:bold;color:red;font-size:10px;width:250px">Title`s Comment cropped, max. 150 characters</span>';
      die();
  }

  if (!isset($body) || strlen($body) < 10){
    echo '<span style="font-weight:bold;color:red;font-size:10px;width:250px">Please write a `Body` longer than 10 characters</span>';
    include 'includes/grid_text_reply.php';
    die();
  }elseif (strlen($title) > 1500){
      $body = substr($body,0,1500);
      echo '<span style="font-weight:bold;color:red;font-size:10px;width:250px">Body`s Comment cropped, max. 1500 characters</span>';
  }
  $comment = new controllerComments();
  $result = $comment->createReply($_SESSION['user_id'], $id_blog, $title, $body, 1);
  if($result == true){
    include 'includes/grid_text_reply.php';
    die();
    echo "<script>window.location.href = '?pg=single&id=".$_SESSION['active_blog']."&title=".$_SESSION['active_title']."&tag='.$tag;</script>";
  }else{
    echo "<script>window.location.href = '?pg=start&er=5';</script>";
  }
}
