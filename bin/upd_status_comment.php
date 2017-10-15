<?php
if (!isset($_SESSION['id_level'])){
	header ('Location: ?pg=start&er=4');
	exit;
}elseif(!$_SESSION['id_level'] == 0){
		header ('Location: ?pg=start&er=25');
		exit;
}else{
  if(isset($_POST['id']) && isset($_POST['status_comment']) && $_POST['status_comment']>= 0 && $_POST['status_comment'] <=1){
    $id = trim(filter_input(INPUT_POST, 'id', $filter = FILTER_VALIDATE_INT));
    $status = trim(filter_input(INPUT_POST, 'status_comment', $filter = FILTER_VALIDATE_INT));
    $comment = new controllerComments();
    $result = $comment->changeStatusComment($id, $status);
    if ($result == true){
      header ('Location: ?pg=admin&tab=5&suc=15');
    }else{
      header ('Location: ?pg=admin&tab=5&er=39');
    }
  }else{
    header ('Location: ?pg=admin&tab=5&er=37');
  }
}
