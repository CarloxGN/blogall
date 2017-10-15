<?php
if (!isset($_SESSION['id_level'])){
	header ('Location: ?pg=start&er=4');
	exit;
}elseif(!$_SESSION['id_level'] == 0){
		header ('Location: ?pg=start&er=25');
		exit;
}else{
  if(isset($_POST['id']) && isset($_POST['level_user']) && $_POST['level_user']>= 1 && $_POST['level_user'] <= 2){
    $id_user = trim(filter_input(INPUT_POST, 'id', $filter = FILTER_VALIDATE_INT));
    $id_level = trim(filter_input(INPUT_POST, 'level_user', $filter = FILTER_VALIDATE_INT));
    $user = new controllerUsers();
    $result = $user->updateLvlUser($id_user, $id_level);
    if ($result == true){
      header ('Location: ?pg=admin&tab=3&suc=16');
    }else{
      header ('Location: ?pg=admin&tab=3&er=40');
    }
  }else{
		echo 'lvl ='.$_POST['level_user']. ' // id user = '.$_POST['id'];
		exit;
    header ('Location: ?pg=admin&tab=3&er=37');
  }
}
