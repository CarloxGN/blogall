<?php
  if (!isset($_POST['database_host']) || !isset($_POST['database_name']) || !isset($_POST['database_username']) || !isset($_POST['idle_time']) || !isset($_POST['websitepath'])){
    header ('Location: ?pg=admin&tab=1&er=18');
    exit;
  }

  $database_host      = trim(filter_input(INPUT_POST, 'database_host', $filter = FILTER_SANITIZE_STRING));
  $database_name      = trim(filter_input(INPUT_POST, 'database_name', $filter = FILTER_SANITIZE_STRING));
  $database_username  = trim(filter_input(INPUT_POST, 'database_username', $filter = FILTER_SANITIZE_STRING));
  $idle_time          = trim(filter_input(INPUT_POST, 'idle_time',    $filter = FILTER_VALIDATE_INT));
  $websitepath        = trim(filter_input(INPUT_POST, 'websitepath', $filter = FILTER_SANITIZE_STRING));
  $security          = trim(filter_input(INPUT_POST, 'security',   $filter = FILTER_SANITIZE_STRING));
  
  if(substr($websitepath, -1)!='/'){
    $websitepath     .='/';
  }

  if($_POST['database_password']){
    $database_password = trim(filter_input(INPUT_POST, 'database_password', FILTER_VALIDATE_INT));
  }else{
    $database_password = '';
  }


  include_once 'bin/Config.process.php';
  $create = new controllerCreateConfig();
  $result = $create->newConfig($database_host, $database_username, $database_name, $database_password, $idle_time, $websitepath, $security);
  if ($result == true){
    $create->newWSPath($websitepath);
    header ('Location: ?pg=logout');
  }else{
    header ('Location: ?pg=admin&tab=1&er=34');
  }
