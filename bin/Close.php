<?php
if (isset($_GET['er']) && $_GET['er']==24) $err = filter_input(INPUT_GET, 'er', $filter = FILTER_SANITIZE_STRING);
$log = new controllerLogin();
$log->newSession();

$_SESSION = array();

$params = session_get_cookie_params();

setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);

session_destroy();
if (isset($err) && $err == 24):
  header('Location: index.php?pg=start&er=24');
else:
  header('Location: index.php?pg=start&suc=1');
endif;
