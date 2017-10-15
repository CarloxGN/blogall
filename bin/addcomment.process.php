<?php
if(!$_SESSION['user_id']){
  header ('Location: index.php?pg=login');
  die();
}
if (!isset($_POST['title']) || !isset($_POST['body']) || !isset($_POST['ref']) || !isset($_POST['id_blog'])){
  echo "<script>window.location.href = '?pg=start&er=5';</script>";
}else{
  $user = $_SESSION['user_id'];
  $blog = trim(filter_input(INPUT_POST, 'id_blog', FILTER_VALIDATE_INT));
  $ref = trim(filter_input(INPUT_POST, 'ref', FILTER_VALIDATE_INT));
  $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
  $body = trim(filter_input(INPUT_POST, 'body', FILTER_SANITIZE_STRING));

  $comment = new controllerComments();
  $result = $comment->createComment($user, $blog, $title, $body, 0);
  if($result == 1){
    include 'bin/comments.process.php';
  }else{
    echo "<script>window.location.href = '?pg=start&er=15';</script>";
  }
}
