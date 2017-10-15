<?php
function step_6(){
  if($_SESSION['finish'] == 'ok'){
    include_once 'bin/Config.process.php';
    $finish = new controllerCreateConfig();
    $finish->newWSPath($_SESSION['websitepath']);
    session_destroy();
    echo '<div class="alert alert-success">BlogAll is Installed!!!... CONGRATULATIONS</div><br>';
    echo '<div class="alert alert-warning">Important: When the system is in production, Config file`s "Security" option must be in TRUE</div><p>&nbsp;</p><p>&nbsp;</p>';
    echo '<div class="alert alert-info">To continue, please <a href="?pg=start">click here<a></div>';
  }else{
    echo "<script>window.location.href='?pg=installer';</script>";
  }
}
