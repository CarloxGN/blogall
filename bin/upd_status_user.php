<?php
if (!isset($_SESSION['id_level'])){
	header ('Location: ?pg=start&er=4');
	exit;
}elseif(!$_SESSION['id_level'] == 0){
		header ('Location: ?pg=start&er=25');
		exit;
}else{
  if(isset($_POST['id']) && isset($_POST['status_user']) && $_POST['status_user']>= 0 && $_POST['status_user'] <=1){
    $id = trim(filter_input(INPUT_POST, 'id', $filter = FILTER_VALIDATE_INT));
    $status = trim(filter_input(INPUT_POST, 'status_user', $filter = FILTER_VALIDATE_INT));
    $user = new controllerUsers();
    $result = $user->changeStatusUser($id, $status);
    if ($result == true){
      header ('Location: ?pg=admin&tab=3&suc=11');
    }else{
      header ('Location: ?pg=admin&tab=3&er=36');
    }
  }else{
    header ('Location: ?pg=admin&tab=3&er=37');
  }
}
