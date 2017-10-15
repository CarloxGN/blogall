<?php
if (isset($_POST['email']) && filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) == true){
  $email_user = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
}else{
  echo 'Attention: Error in email format';
  exit;
}

if (isset($_POST['p'])) $pass_user = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);

if (!isset($_SESSION['username']) && !isset($_SESSION['user_id']) && isset($email_user) && isset($pass_user)){
  $logger = new controllerLogin();
  $result = $logger->logIn($email_user, $pass_user);
  echo $result;
}else{
  header ('Location: index.php');
}
