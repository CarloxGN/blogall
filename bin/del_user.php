<?php
if (!isset($_SESSION['id_level'])){
	header ('Location: ?pg=start&er=4');
	exit;
}elseif(!$_SESSION['id_level'] == 0){
		header ('Location: ?pg=start&er=25');
		exit;
}else{
  $user = new controllerUsers();
  $result = $user->deleteUser($_GET['id']);
  if ($result == true) {
    header ('Location: ?pg=admin&tab=3&suc=10');
  }else{
    header ('Location: ?pg=admin&tab=3&er=32');
  }
}
