<?php
if (!isset($_POST['name']) && !isset($_POST['email']) && !isset($_POST['subject']) && !isset($_POST['message'])){
  header ('Location: ?pg=contact&er=5');
  exit;
}else{
  $msg='';
  $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
  if($_POST['email'] == trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL))){
    $email = $_POST['email'];
  }else{
      header ('Location: ?pg=contact&er=2');
  }

  $subject = trim(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING));
  $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING));

  if (strlen($name) > 20){
    $name = substr($name,0,40);
    $msg .= '// Name cropped ';
  }

  if (strlen($email) > 40){
    $email = substr($email,0,40);
    $msg .= '// Email cropped ';
  }

  if (strlen($subject) > 120){
    $subject = substr($subject,0,120);
    $msg .= '// Subject cropped ';
  }

  if (strlen($message) > 600){
      $message = substr($message,0,600);
      $msg .= '//  Message cropped ';
  }
  include 'bin/contactemail.process.php';
  echo "<script>window.location.href='?pg=contact&suc=17&msg=".$msg."';</script>";
}
