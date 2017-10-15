<?php
include_once 'Database.class.php';
class Login{
  private $id_user;
  private $name_user;
  private $pass_pass;
  private $email_user;
  private $valid_attempts;

  private $attrib;
  private $field;
  private $value;
  private $conn;
  private $query;

  public function __construct(){
    $this->conn = new Database();
  }

  public function set($attrib, $content) {
    $this->$attrib  = $content;
    $this->field    = $attrib;
    $this->value    = $content;
  }

  public function get($attrib) {
    return $this->$attrib;
  }

  public function security_session_start() {
      $secure = SECURE;
      return $secure;
  }

  public function log_session() {
    try {
      $this->query = $this->conn->prepare('select * from tbl_users inner join tbl_levels on tbl_users.id_level = tbl_levels.id_level where email_user = :email_user limit 1');
      $this->query->bindValue(':email_user', $this->email_user, PDO::PARAM_INT);
      $this->query->execute();
      $result = $this->query->fetchAll();
      $this->query = null;
      return $result;
    }catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function checkbrute() {
    try {
      $this->query = $this->conn->prepare("select sum(try) from login_attempts where id_user = :id_user");
      $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
      $result = $this->query->execute();
      $summ = $this->query->fetch(PDO::FETCH_NUM);
      $count = $summ[0];
      $this->query = null;
      return $count;
    }catch (PDOException $e) {
        $e->getMessage();
    }
  }

  public function clean_attempts(){
      try {
          $this->query = $this->conn->prepare('delete from login_attempts where id_user = :id_user');
          $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
          $this->query->execute();
          $this->query = null;
      } catch (PDOException $e) {
          $e->getMessage();
      }
  }

  public function register_attempts(){
    try {
      $this->query = $this->conn->prepare("insert into login_attempts values (:id_user, null, 1)");
      $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
      $this->query->execute();
      $this->query = null;
    }catch (PDOException $e) {
      $e->getMessage();
    }
  }

  //logincheck here
  public function login_check(){
    try{
      $this->query = $this->conn->prepare("select pass_user from tbl_users where id_user = :id_user limit 1");
      $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
      $this->query->execute();
      $count = $this->query->fetchAll();
      $this->query = null;
      return $count;
    }catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function validate_field(){
    try{
      $this->query = $this->conn->prepare("select id_user from tbl_users where ".$this->field." = :value limit 1");
      $this->query->bindValue(':value', $this->value, PDO::PARAM_INT);
      $this->query->execute();
      $count = $this->query->rowCount();
      $this->query = null;
      return $count;
    }catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function validate_field_update(){
    try{
      $this->query = $this->conn->prepare("select id_user from tbl_users where ".$this->field." = :value && id_user ! = :id_user limit 1");
      $this->query->bindValue(':value', $this->value, PDO::PARAM_INT);
      $this->query->bindValue(':id_user', $_SESSION['user_id'], PDO::PARAM_INT);
      $this->query->execute();
      $count = $this->query->rowCount();
      $this->query = null;
      return $count;
    }catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function close(){
    session_start();
    session_destroy();
    return true;
  }
}
