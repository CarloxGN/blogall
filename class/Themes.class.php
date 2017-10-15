<?php
//include 'Database.class.php';
class Themes{
    private static $instance;
    private $id_theme;
    private $theme_blog;

    //connection attribs
    private $query;
    private $conn;

    public function __construct(){
      $this->conn = new Database();
    }

    public function set($attrib, $content) {
      $this->$attrib = $content;
    }

    public function get($attrib) {
      return $this->$attrib;
    }

    public function get_themes(){
      try {
        $this->query = $this->conn->prepare('select * from tbl_themes');
      	$this->query->execute();
    		$result = $this->query->fetchAll();
        $this->query = null;
        return $result;
      }catch (PDOException $e) {
          $e->getMessage();
      }
    }

    public function get_theme(){
        try {
            $this->query = $this->conn->prepare('select * from tbl_themes where id_theme = :id_them');
            $this->query->bindValue(':id_theme', $this->id_theme, PDO::PARAM_INT);
            $this->query->execute();
            $result = $this->query->fetchAll();
            $this->query = null;
            return $result;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function delete_theme(){
        try {
            $this->query = $this->conn->prepare('delete from tbl_themes where id_theme = :id_theme');
            $this->query->bindValue(':id_theme', $this->id_theme, PDO::PARAM_INT);
            $this->query->execute();
            $count = $this->query->rowCount();
            $this->query = null;
            return $count;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function create_theme(){
        try {
            $this->query = $this->conn->prepare('insert into tbl_themes values(null,:theme_blog)');
            $this->query->bindValue(':theme_blog', $this->id_user, PDO::PARAM_INT);
            $this->query->execute();
            $count = $this->query->rowCount();
            $this->query = null;
            return $count;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update_theme(){
        try {
            $this->query = $this->conn->prepare('update tbl_themes set theme_blog = :theme_blog where id_theme = :id_theme');
            $this->query->bindValue(':id_theme', $this->id_theme, PDO::PARAM_INT);
            $this->query->execute();
            $count = $this->query->rowCount();
            $this->query = null;
            return $count;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function __clone(){
        trigger_error('Clone option do not allowed!.', E_USER_ERROR);
    }
}
