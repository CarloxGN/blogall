<?php
function img_evaluator($result, $img){
     switch ($result){
       case 1:
         return '<div class="alert alert-danger">ATTENTION: '.$img.' image too big</div>';
         break;
       case 2:
         return '<div class="alert alert-danger">ATTENTION: '.$img.' too large</div>';
         break;
       case 3:
         return '<div class="alert alert-danger">ATTENTION: Only PNG files are accepted</div>';
         break;
       case 4:
         echo '<div class="alert alert-danger">ATTENTION: '.$img.' not uploaded</div>';
         break;
       case 5:
           $flag = 1;
           break;
       default:
         return '<div class="alert alert-danger">ATTENTION: Error uploading '.$img.'`s file. Please check your write privileges in the installation folder</div>';
     }
}
