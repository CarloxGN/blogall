<?php
$comment = new controllerComments();
if(!isset($_SESSION['active_blog'])) echo "<script>window.location.href='?pg=start&er=6'</script>";
$list_comments = $comment->listComments($_SESSION['active_blog'], 0, $_SESSION['active_blog']);
if($list_comments == false){
  echo '<div class="grid_text" style="color: red">No comments until now</div>';
}else{
  foreach($list_comments as $com){
    $_SESSION['active_comment'] = $com['id_comment'];
    include 'includes/grid_text_comment.php';
  }
}
