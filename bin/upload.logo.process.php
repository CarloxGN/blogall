<?php
function upload_image($img, $maxw, $w, $h){

  $type             = $_FILES[$img]['type'];
  $weight           = $_FILES[$img]['size'];
  $temporal         = $_FILES[$img]['tmp_name'];
  $size             = getimagesize($_FILES[$img]['tmp_name']);
  $width            = $size[0];
  $high             = $size[1];
  $uploadedfileload = true;
  if ($weight > $maxw){
    return 1;
    exit;
  }

  if ($width > $w || $high > $h){
    return 2;
    exit;
  }

  switch($type){
    case 'image/png':
      $ext = '.png';
      break;
    default:
      return 3;
      break;
  }

  $media_blog = $img.$ext;

  $add = 'images/'.$media_blog;
  
  if($uploadedfileload != false){
    if(move_uploaded_file ($_FILES[$img]['tmp_name'], $add)){
      return 5;
    }else{
      return 4;
    }
  }
}
