<?php
if (!isset($_SESSION['id_level'])){
	header ('Location: ?pg=start&er=4');
	exit;
}elseif(!$_SESSION['id_level'] == 0){
		header ('Location: ?pg=start&er=25');
		exit;
}else{
  if(isset($_POST['id']) && isset($_POST['status_blog']) && $_POST['status_blog']>= 0 && $_POST['status_blog'] <=1){
    $id = trim(filter_input(INPUT_POST, 'id', $filter = FILTER_VALIDATE_INT));
    $status = trim(filter_input(INPUT_POST, 'status_blog', $filter = FILTER_VALIDATE_INT));
    $blog = new controllerBlogs();
    $result = $blog->changeStatusBlog($id, $status);
    if ($result == true){
      header ('Location: ?pg=admin&tab=4&suc=13');
    }else{
      header ('Location: ?pg=admin&tab=4&er=38');
    }
  }else{
    header ('Location: ?pg=admin&tab=4&er=37');
  }
}
