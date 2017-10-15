<?php
if (isset($_GET['er']) && is_numeric($_GET['er'])) $err = filter_input(INPUT_GET, 'er', $filter = FILTER_VALIDATE_INT);
if (isset($_GET['suc'])) $succ = filter_input(INPUT_GET, 'suc', $filter = FILTER_SANITIZE_STRING);
if (isset($_GET['error'])) $errorr = filter_input(INPUT_GET, 'error', $filter = FILTER_SANITIZE_STRING);
if (isset($_GET['msg'])):
  $msg = filter_input(INPUT_GET, 'msg', $filter = FILTER_SANITIZE_STRING);
else:
  $msg = '';
endif;

if (isset($err) && isset($succ)):
  echo '<div class="alert alert-danger">Please do not play with URI`s variables. Thanks!</div>';
  unset($succ);
  unset($er);
endif;
  if (isset($err)):
    unset($succ);
    switch ($err):
      case 1:
        echo '<div class="alert alert-danger">Wrong Session data</div>';
        break;

      case 2:
        echo '<div class="alert alert-danger">Not a valid email address</div>';
        break;

      case 3:
        echo '<div class="alert alert-danger">Invalid password configuration</div>';
        break;

      case 4:
        echo '<div class="alert alert-danger">Please log first</div>';
        break;

      case 5:
        echo '<div class="alert alert-danger">Incomplete data</div>';
        break;

      case 6:
        echo '<div class="alert alert-danger">Safe session could not be started (ini_set)</div>';
        break;

      case 7:
        echo '<div class="alert alert-danger">Error closing session</div>';
        break;

      case 8:
        echo '<div class="alert alert-danger">Wrong name format. Just numbers, white spaces and letters</div>';
        break;

      case 9:
        echo '<div class="alert alert-danger">This email account is in-use</div>';
        break;

      case 10:
        echo '<div class="alert alert-danger">Emails are different</div>';
        break;

      case 11:
        echo '<div class="alert alert-danger">Passwords are different</div>';
        break;

      case 12:
        echo '<div class="alert alert-danger">Error in type of image. '.$msg.'</div>';
        break;

      case 13:
        echo '<div class="alert alert-danger">There was an error uploading this file to the server. No writing privileges</div>';
        break;

      case 14:
        echo '<div class="alert alert-danger">Post not found</div>';
        break;

      case 15:
        echo '<div class="alert alert-danger">Error recording in DB.<br>Please try again or send a email to the Webmaster. Thanks!</div>';
        break;

      case 16:
        echo '<div class="alert alert-danger">This Username is in-use</div>';
        break;

      case 17:
        echo '<div class="alert alert-danger">Username must be at least of 4 characters long. Thanks!</div>';
        break;

      case 18:
        echo '<div class="alert alert-danger">Please complete all fields. Thanks</div>';
        break;

      case 19:
        echo '<div class="alert alert-danger">Unless one number and one lower letter and another capital. Please, try it again</div>';
        break;

      case 20:
        echo '<div class="alert alert-danger">Password must have more than 6 characters. Please, try it again</div>';
        break;

      case 21:
        echo '<div class="alert alert-danger">Username must have only letters and numbers. Please, try it again</div>';
        break;

      case 22:
        echo '<div class="alert alert-danger">Error mismatch. Wrong Email or Password. Please check your data.</div>';
        break;

      case 23:
        echo '<div class="alert alert-danger">Account temporarily suspended by many wrong login attempts</div>';
        break;

      case 24:
        echo '<div class="alert alert-info">Session has timed out due to inactivity</div>';
        break;

      case 25:
        echo '<div class="alert alert-danger">Your account does not have enough Access-Privileges</div>';
        break;

      case 26:
        echo '<div class="alert alert-danger">Blog\'s Media input is empty</div>';
        break;

      case 27:
        echo '<div class="alert alert-danger">Your account does not have enough privileges to edit this information</div>';
        break;

      case 28:
        echo '<div class="alert alert-danger">Comment not found</div>';
        break;

      case 29:
        echo '<div class="alert alert-danger">Comment suspended. Please contact the Webmaster for more details</div>';
        break;

      case 30:
        echo '<div class="alert alert-danger">You must agree to the license</div>';
        break;

      case 31:
        echo '<div class="alert alert-danger">Error updating Miscellaneous data</div>';
        break;

      case 32:
        echo '<div class="alert alert-danger">Error deleting user</div>';
        break;

      case 33:
        echo '<div class="alert alert-danger">Error in data type</div>';
        break;

      case 34:
        echo '<div class="alert alert-danger">ATTENTION: File Config.php has a Writing Error. Check your writing privileges</div>';
        break;

      case 35:
        echo '<div class="alert alert-danger">ATTENTION: Error updating Miscellaneous Information</div>';
        break;

      case 36:
        echo '<div class="alert alert-danger">ATTENTION: Error updating User`s status</div>';
        break;

      case 37:
        echo '<div class="alert alert-danger">ATTENTION: Wrong value choosed</div>';
        break;

      case 38:
        echo '<div class="alert alert-info">INFORMATION: No change executed in the blog`s status</div>';
        break;

      case 39:
        echo '<div class="alert alert-info">INFORMATION: No change executed in the comment`s status</div>';
        break;

      case 40:
        echo '<div class="alert alert-info">INFORMATION: No change executed in the user`s level</div>';
        break;

      default:
      echo '<div class="alert alert-danger">Please do not play with URI\'s variables. Thanks</div>';
      break;
    endswitch;
  endif;

  if (isset($succ)):
    unset($err);
    switch ($succ):
      case 1:
        echo '<div class="alert alert-info">Session close</div>';
        break;
      case 2:
        echo '<div class="alert alert-success">Member registered succesfully. '.$msg.'</div>';
        break;
      case 3:
        echo '<div class="alert alert-success">Session started succesfully</div>';
        break;
      case 4:
        echo '<div class="alert alert-success">User data updated succesfully</div>';
        break;
      case 5:
        echo '<div class="alert alert-success">Post deleted succesfully</div>';
        break;
      case 6:
        echo '<div class="alert alert-success">Post updated succesfully</div>';
        break;
      case 7:
        echo '<div class="alert alert-success">Comment deleted succesfully</div>';
        break;
      case 8:
        echo '<div class="alert alert-success">Comment updated succesfully</div>';
        break;
      case 9:
        echo '<div class="alert alert-success">Miscellaneous data updated succesfully</div>';
        break;
      case 10:
        echo '<div class="alert alert-success">User deleted succesfully</div>';
        break;
      case 11:
        echo '<div class="alert alert-success">User`s status changed succesfully</div>';
        break;
      case 12:
        echo '<div class="alert alert-success">Blog deleted succesfully</div>';
        break;
      case 13:
        echo '<div class="alert alert-success">Blog`s status changed succesfully</div>';
        break;
      case 14:
        echo '<div class="alert alert-success">Comment deleted succesfully</div>';
        break;
      case 15:
        echo '<div class="alert alert-success">Comment`s status changed succesfully</div>';
        break;
      case 16:
        echo '<div class="alert alert-success">User`s level changed succesfully</div>';
        break;
      case 17:
        echo '<div class="alert alert-success">Contact successfully sent. '.$msg.'</div>';
        break;
      default:
        echo '<div class="alert alert-danger">Please do not play with URI\'s variables. Thanks</div>';
        break;
    endswitch;
  endif;

  if (isset($errorr)) :
      echo '<div class="alert alert-danger">Error Logging In!</div>';
  endif;
