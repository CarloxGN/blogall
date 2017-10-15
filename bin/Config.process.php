<?php
class Config_process{
  private $database_host;
  private $database_username;
  private $database_name;
  private $database_password;
  private $idle_time;
  private $websitepath;
  private $system_security;

  private $database_inf;
  private $file;

  //Methods
  public function set($attrib, $content) {
    $this->$attrib  = $content;
  }

  public function get($attrib) {
    return $this->$attrib;
  }

  public function new_config(){
    $f = fopen("config/Config.php","w");
    $this->database_inf="<?php
    define('HOST', '".       $this->database_host."');
    define('PASSWORD', '".   $this->database_password."');
    define('DATABASE', '".   $this->database_name."');
    define('USER', '".       $this->database_username."');
    define('CAN_REGISTER',   'any');
    define('DEFAULT_ROLE',   2);
    define('IDLETIME', '".   $this->idle_time."'); // Max. session's inactivity time
    define('SECURE', ".      $this->system_security."); // Important: When the system is in production, this option must be in TRUE in order to look up any movement";

    if (fwrite($f,$this->database_inf) > 0){
      fclose($f);
      return true;
    }
  } //end function new_config

  public function new_websitepath(){
    $f = fopen("config/Config.php","a+");
    $this->database_inf="
    define('WEBSITEPATH', '".$this->websitepath."'); //Website Address";

    if (fwrite($f,$this->database_inf) > 0){
      fclose($f);
      return true;
    }
  } //end function new_websitepath
} //end class Config.process
