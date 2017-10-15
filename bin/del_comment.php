<?php
if (!isset($_SESSION['id_level'])){
	header ('Location: ?pg=start&er=4');
	exit;
}elseif(!$_SESSION['id_level'] == 0){
		header ('Location: ?pg=start&er=25');
		exit;
}else{
  $comment = new controllerComments();
  $result = $comment->deleteComment($_POST['id'], $_POST['id_user']);
  if ($result == true) {
		$comment->deleteCommentsReplies($_POST['id']);
    header ('Location: ?pg=admin&tab=5&suc=14');
  }else{
    header ('Location: ?pg=admin&tab=5&er=39');
  }
}
