<?php
class Users{
    private static $instance;
    private $id_user;
    private $name_user;
    private $pass_user;
    private $salt_user;
    private $avatar_user;
    private $email_user;
    private $sex_user;
    private $web_user;
    private $register_user;
    private $id_level;
    private $status_user;
    private $facebook_user;
    private $twitter_user;
    private $google_user;
    private $linkedin_user;
    private $name_level;

    // DB Connection attrib
    private $conn;
    private $query;
    // Config attrib
    private $attrib;

    public function __construct(){
      $this->conn = new Database();
    }

    public static function singleton(){
        if (!isset(self::$instance)) {
            $myclass = __CLASS__;
            self::$instance = new $myclass;
        }
        return self::$instance;
    }

    public function set($attrib, $content) {
      $this->$attrib = $content;
    }

    public function get($attrib) {
      return $this->$attrib;
    }

    public function get_user(){
        try {
            $this->query = $this->conn->prepare('select * from tbl_users where id_user = :id_user');
            $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
            $this->query->execute();
            $data = $this->query->fetchAll();
            $this->query = null;
            return $data;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function get_users(){
        try {
            $this->query = $this->conn->prepare('select * from tbl_users inner join tbl_levels on tbl_users.id_level = tbl_levels.id_level where tbl_users.id_level > 0');
            $this->query->execute();
            $data = $this->query->fetchAll();
            $this->query = null;
            return $data;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function get_user_pass(){
        try {
            $this->query = $this->conn->prepare('select pass_user, salt_user from tbl_users where id_user = :id_user');
            $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
            $this->query->execute();
            $data = $this->query->fetchAll();
            $this->query = null;
            return $data;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function delete_user(){
        try {
            $this->query = $this->conn->prepare('delete from tbl_users where id_user = :id_user');
            $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
            $this->query->execute();
            $result = $this->query->rowCount();
            $this->query = null;
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function insert_user(){
        try {
          $this->query = $this->conn->prepare('insert into tbl_users values (null, :name_user, :email_user, :pass_user, :sex_user, :web_user, :facebook_user, :twitter_user, :google_user, :linkedin_user, :avatar_user, :salt_user, null, :id_level, :status_user)');
          $this->query->bindValue(':name_user', $this->name_user, PDO::PARAM_INT);
          $this->query->bindValue(':email_user', $this->email_user, PDO::PARAM_INT);
          $this->query->bindValue(':pass_user', $this->pass_user, PDO::PARAM_INT);
          $this->query->bindValue(':sex_user', $this->sex_user, PDO::PARAM_INT);
          $this->query->bindValue(':web_user', $this->web_user, PDO::PARAM_INT);
          $this->query->bindValue(':facebook_user', $this->facebook_user, PDO::PARAM_INT);
          $this->query->bindValue(':twitter_user', $this->twitter_user, PDO::PARAM_INT);
          $this->query->bindValue(':google_user', $this->google_user, PDO::PARAM_INT);
          $this->query->bindValue(':linkedin_user',$this->linkedin_user, PDO::PARAM_INT);
          $this->query->bindValue(':avatar_user', $this->avatar_user, PDO::PARAM_INT);
          $this->query->bindValue(':salt_user', $this->salt_user, PDO::PARAM_INT);
          $this->query->bindValue(':id_level', $this->id_level, PDO::PARAM_INT);
          $this->query->bindValue(':status_user', $this->status_user, PDO::PARAM_INT);

          $this->query->execute();
          $this->query = null;
          return true;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update_level_user(){
        try {
            $this->query = $this->conn->prepare('update tbl_users set id_level = :id_level where id_user = :id_user');
            $this->query->bindValue(':id_level', $this->id_level, PDO::PARAM_INT);
            $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
            $this->query->execute();
            return $this->query->rowCount();
            $this->query = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update_status_user(){
        try {
            $this->query = $this->conn->prepare('update tbl_users set status_user = :status_user where id_user = :id_user');
            $this->query->bindValue(':status_user', $this->status_user, PDO::PARAM_INT);
            $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
            $this->query->execute();
            return $this->query->rowCount();
            $this->query = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update_user(){
        try {
            $this->query = $this->conn->prepare('update tbl_users set name_user =:name_user , email_user = :email_user, pass_user = :pass_user, sex_user = :sex_user, web_user = :web_user, facebook_user = :facebook_user, twitter_user = :twitter_user, google_user = :google_user, linkedin_user = :linkedin_user, avatar_user = :avatar_user, salt_user = :salt_user, register_user =  null, id_level = :id_level, status_user = :status_user where id_user = :id_user');
            $this->query->bindValue(':name_user', $this->name_user, PDO::PARAM_INT);
            $this->query->bindValue(':email_user', $this->email_user, PDO::PARAM_INT);
            $this->query->bindValue(':pass_user', $this->pass_user, PDO::PARAM_INT);
            $this->query->bindValue(':sex_user', $this->sex_user, PDO::PARAM_INT);
            $this->query->bindValue(':web_user', $this->web_user, PDO::PARAM_INT);
            $this->query->bindValue(':facebook_user', $this->facebook_user, PDO::PARAM_INT);
            $this->query->bindValue(':twitter_user', $this->twitter_user, PDO::PARAM_INT);
            $this->query->bindValue(':google_user', $this->google_user, PDO::PARAM_INT);
            $this->query->bindValue(':linkedin_user',$this->linkedin_user, PDO::PARAM_INT);
            $this->query->bindValue(':avatar_user', $this->avatar_user, PDO::PARAM_INT);
            $this->query->bindValue(':salt_user', $this->salt_user, PDO::PARAM_INT);
            $this->query->bindValue(':id_level', $this->id_level, PDO::PARAM_INT);
            $this->query->bindValue(':status_user', $this->status_user, PDO::PARAM_INT);
            $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
            $this->query->execute();
            return $this->query->rowCount();
            $this->query = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    private function __clone(){
        trigger_error('Clone option does not allowed!.', E_USER_ERROR);
    }
}
