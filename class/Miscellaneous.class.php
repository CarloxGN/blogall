<?php
//include_once 'Database.class.php';
class Miscellaneous {
  //Atributos
  private $name_site;
  private $slogan_site;
  private $welcome_site;
  private $maintext_site;
  private $contact_site;
  private $facebook_site;
  private $google_site;
  private $linkedin_site;
  private $youtube_site;
  private $about_site;
  private $keywords_site;

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

  public function get($attrib) {
    return $this->$attrib;
  }

  public function get_miscellaneous(){
    try {
      $this->query = $this->conn->prepare('select * from tbl_miscellaneous');
  		$this->query->execute();
  		$result = $this->query->fetchAll();
      $this->query = null;
      return $result;
    }catch (PDOException $e) {
        $e->getMessage();
    }
  }

  public function insert_miscellaneous(){
          try {
              $this->query = $this->conn->prepare('insert into tbl_miscellaneous values (
                                                  :id_blog,
                                                  :name_site,
                                                  :slogan_site,
                                                  :welcome_site,
                                                  :maintext_site,
                                                  :contact_site,
                                                  :facebook_site,
                                                  :google_site,
                                                  :linkedin_site,
                                                  :youtube_site,
                                                  :about_site,
                                                  :keywords_site)
                                                  ');
              $this->query->bindValue(':id_blog', $this->id_blog, PDO::PARAM_INT);
              $this->query->bindParam(':name_site', $this->name_site, PDO::PARAM_INT);
              $this->query->bindParam(':slogan_site', $this->slogan_site, PDO::PARAM_INT);
              $this->query->bindParam(':welcome_site', $this->welcome_site, PDO::PARAM_INT);
              $this->query->bindParam(':maintext_site', $this->maintext_site, PDO::PARAM_INT);
              $this->query->bindParam(':contact_site', $this->contact_site, PDO::PARAM_INT);
              $this->query->bindParam(':facebook_site', $this->facebook_site, PDO::PARAM_INT);
              $this->query->bindParam(':google_site', $this->google_site, PDO::PARAM_INT);
              $this->query->bindParam(':linkedin_site', $this->linkedin_site, PDO::PARAM_INT);
              $this->query->bindParam(':youtube_site', $this->youtube_site, PDO::PARAM_INT);
              $this->query->bindParam(':about_site', $this->about_site, PDO::PARAM_INT);
              $this->query->bindParam(':keywords_site', $this->keywords_site, PDO::PARAM_INT);
              $this->query->execute();
              $result = $this->query->rowCount();
              $this->query = null;
              return $result;
          } catch (PDOException $e) {
              $e->getMessage();
          }
  }

  public function update_miscellaneous(){
    try {
      $this->query = $this->conn->prepare(
      'update tbl_miscellaneous set name_site = :name_site, slogan_site = :slogan_site, welcome_site = :welcome_site, maintext_site = :maintext_site, contact_site = :contact_site, facebook_site = :facebook_site, google_site = :google_site, 	linkedin_site = :linkedin_site, youtube_site = :youtube_site, about_site = :about_site, keywords_site = :keywords_site where id_site = 1'
      );
      $this->query->bindValue(':name_site', $this->name_site, PDO::PARAM_INT);
      $this->query->bindValue(':slogan_site', $this->slogan_site, PDO::PARAM_INT);
      $this->query->bindValue(':welcome_site', $this->welcome_site, PDO::PARAM_INT);
      $this->query->bindValue(':maintext_site', $this->maintext_site, PDO::PARAM_INT);
      $this->query->bindValue(':contact_site', $this->contact_site, PDO::PARAM_INT);
      $this->query->bindValue(':facebook_site', $this->facebook_site, PDO::PARAM_INT);
      $this->query->bindValue(':google_site', $this->google_site, PDO::PARAM_INT);
      $this->query->bindValue(':linkedin_site', $this->linkedin_site, PDO::PARAM_INT);
      $this->query->bindValue(':youtube_site', $this->youtube_site, PDO::PARAM_INT);
      $this->query->bindValue(':about_site', $this->about_site, PDO::PARAM_INT);
      $this->query->bindValue(':keywords_site', $this->keywords_site, PDO::PARAM_INT);
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
