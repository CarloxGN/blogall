<?php
//include 'Database.class.php';
class Lapses{
    private static $instance;
    private $id_lapse;
    private $description_lapse;

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

    public function get_lapses(){
      try {
        $this->query = $this->conn->prepare('select * from tbl_lapses');
      	$this->query->execute();
    		$result = $this->query->fetchAll();
        $this->query = null;
        return $result;
      }catch (PDOException $e) {
          $e->getMessage();
      }
    }

    public function get_lapse(){
        try {
            $this->query = $this->conn->prepare('select * from tbl_lapses where id_lapse = :id_lapse');
            $this->query->bindValue(':id_lapse', $this->id_lapse, PDO::PARAM_INT);
            $this->query->execute();
            $result = $this->query->fetchAll();
            $this->query = null;
            return $result;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function delete_lapse(){
        try {
            $this->query = $this->conn->prepare('delete from tbl_lapses where id_lapse = :id_lapse');
            $this->query->bindValue(':id_lapse', $this->id_lapse, PDO::PARAM_INT);
            $this->query->execute();
            $count = $this->query->rowCount();
            $this->query = null;
            return $count;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function create_lapse(){
        try {
            $this->query = $this->conn->prepare('insert into tbl_lapses values(null,:description_lapse)');
            $this->query->bindValue(':description_lapse', $this->description_lapse, PDO::PARAM_INT);
            $this->query->execute();
            $count = $this->query->rowCount();
            $this->query = null;
            return $count;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update_lapse(){
        try {
            $this->query = $this->conn->prepare('update tbl_lapses set description_lapse = :description_lapse where id_lapse = :id_lapse');
            $this->query->bindValue(':id_lapse', $this->id_lapse, PDO::PARAM_INT);
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
