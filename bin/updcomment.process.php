<?php
if(!isset($_POST['title']) || !isset($_POST['body']) || !isset($_POST['id'])){
  header ('Location: ?pg=editcomment&er=5');
  exit;
}

$title_comment_upd = trim(filter_input(INPUT_POST, 'title', $filter = FILTER_SANITIZE_STRING));
$body_comment_upd = filter_input(INPUT_POST, 'body', $filter = FILTER_SANITIZE_STRING);
$body_comment_upd = ' >> <span style="color: red;font-size:10px;">Modified: '.date("d-m-Y H:m:s", time()).' </span></br>'.$body_comment_upd;
$id_comment = trim(filter_input(INPUT_POST, 'id', $filter = FILTER_VALIDATE_INT));

$updcomment = new controllerComments();
$data = $updcomment->listCommentSimple($id_comment,$_SESSION['user_id']);

if ($data != true){
  header ('Location: ?pg=start&er=27');
  exit;
}

$update = $updcomment->updateComment($body_comment_upd, $title_comment_upd, $id_comment);
if ($update == true){
  header ('Location: ?pg=editcomment&suc=8&id='.$_SESSION['active_comment'].'&title='.$title_comment_upd);
}else{
  header ('Location: ?pg=editcomment&er=5&id='.$_SESSION['active_comment'].'&title='.$title_comment_upd);
  exit;
}
