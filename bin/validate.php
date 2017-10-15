<?php
if (isset($_POST['username'])) $usr = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
if (isset($_POST['email']) && !filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
    $eml = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    echo "<span style='font-weight:bold;color:red;'>Invalid email address ".$eml."</span>";
    exit;
}else{
    $eml = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
}

if(!empty($usr)) {
  provename($usr);
}

function provename($b) {
  $sql = new controllerLogin();
  $count = $sql->validateName($b);
  if($count == 0){
    echo "<span style='font-weight:bold;color:green;'>Available</span>";
  }else{
    echo "<span style='font-weight:bold;color:red;'>Name in use. Not available</span>";
  }
}

if(!empty($eml)) {
  provemail($eml);
}

function provemail($b) {
  $sql = new controllerLogin();
  $count = $sql->validateEmail($b);
  if($count == 0){
    echo "<span style='font-weight:bold;color:green;'>Available</span>";
  }else{
    echo "<span style='font-weight:bold;color:red;'>Email in use. Not available</span>";
  }
}
