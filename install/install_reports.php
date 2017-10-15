<?php
switch ($_GET['eri']) {
      case 1:
        echo '<div class="alert alert-danger">ATTENTION: Username requested</div>';
        break;

      case 2:
        echo '<div class="alert alert-danger">ATTENTION: Username too short</div>';
        break;

      case 3:
        echo '<div class="alert alert-danger">ATTENTION: Email format error</div>';
        break;

      case 4:
        echo '<div class="alert alert-danger">ATTENTION: Confirmation Email mismatch error</div>';
        break;

      case 5:
        echo '<div class="alert alert-danger">ATTENTION: Confirmation Password mismatch error</div>';
        break;

      case 6:
        echo '<div class="alert alert-danger">Wrong Webmaster`s password format</div>';
        break;

      case 7:
        echo '<div class="alert alert-danger">Webmaster`s image error format</div>';
        break;

      case 8:
        echo '<div class="alert alert-danger">Warning: failed to open stream: Upload file error. Permission denied, please check your writing privileges</div>';
        break;

      case 9:
        echo '<div class="alert alert-danger">Webmaster avatar could not be uploaded, please check your writing privileges</div>';
        break;

      case 10:
        echo '<div class="alert alert-danger">INSTALLATION ERROR: Tables in Database, please check your writing privileges</div>';
        break;
	
	  case 11:
        echo '<div class="alert alert-danger">ATTENTION: Password too short</div>';
        break;
	
      default:
        echo '<div class="alert alert-danger">Please do not play with URI`s variables. Thanks</div>';
      }