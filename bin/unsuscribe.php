<?php
if(isset($_SESSION['user_id'])){
  $user = new controllerUsers();
  $user->unsuscribe();
  $blog = new controllerBlogs();
  $blog->deleteBlogs();
  header ('Location: ?pg=logout');
}else{
  header ('Location: index.php');
}
