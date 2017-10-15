<?php
if($_SESSION['id_level'])!=0) echo "<script>window.location.href='?pg=start&er=25'</script>";

if (!isset($_POST['user_id']) || !is_numeric($_POST['user_id']) || !isset($_POST['status']) || !is_numeric($_POST['status'])) echo "<script>window.location.href:'?pg=admin&tab=3&er=33'";

$user_id = filter_input(INPUT_POST, 'user_id', $filter = FILTER_VALIDATE_INT);
$status = filter_input(INPUT_POST, 'status', $filter = FILTER_VALIDATE_INT);

$user = new controllerUsers();
$result = $user->changeStatusUser($user_id, $status);
if($result == false){
  echo '<div class="grid_text" style="color: red">No comments until now</div>';
}else{
  foreach($list_comments as $com){
    $_SESSION['active_comment'] = $com['id_comment'];
    include 'includes/grid_text_comment.php';
  }
}
