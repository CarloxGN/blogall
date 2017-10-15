<?php
//include_once 'Database.class.php';
class Transactions {
  //Atributos
  private $description_transaction;
  private $id_transaction;

  // private $dbh;
  private static $instance;
  private $conn;
  private $query;
  private $attrib, $content;
  //Connection Attribut to the DB and queries

  public function __construct() {
    $this->conn = new Database();
  }

  public function set($attrib, $content) {
    $this->$attrib = $content;
  }

  public function get($attrib){
    return $this->$attrib;
  }

  public function get_transactions(){
    try {
      $this->query = $this->conn->prepare('select * from tbl_transactions');
  		$this->query->execute();
  		$result = $this->query->fetchAll();
      $this->query = null;
      return $result;
    }catch (PDOException $e) {
        $e->getMessage();
    }
  }

  public function create_transaction(){
          try {
              $this->query = $this->conn->prepare('insert into tbl_transactions values (
                                                  null,
                                                  :description_transaction,
                                                  )
                                                  ');
              $this->query->bindParam(':description_transaction', $this->description_transaction, PDO::PARAM_INT);
              $this->query->execute();
              $result = $this->query->rowCount();
              $this->query = null;
              return $result;
          } catch (PDOException $e) {
              $e->getMessage();
          }
  }

  public function update_transaction(){
    try {
      $this->query = $this->conn->prepare(
      'update tbl_transactions set description_transaction = :description_transaction where id_transaction = :id_transaction'
      );
      $this->query->bindValue(':description_transaction', $this->description_transaction, PDO::PARAM_INT);
      $this->query->bindParam(':id_transaction', $this->id_transaction, PDO::PARAM_INT);
      $this->query->execute();
      $result = $this->query->rowCount();
      $this->query = null;
      return $result;
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  public function __clone(){
    trigger_error('Clone is not allowed!.', E_USER_ERROR);
  }
}
