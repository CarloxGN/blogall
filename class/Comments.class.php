<?php
//include_once 'Database.class.php';
class Comments{
    private static $instance;
    private $id_blog;
    private $id_comment;
    private $id_user;
    private $register_comment;
    private $status_comment;
    private $title_comment;
    private $body_comment;
    private $view_blog;
    private $likes_blog;
    private $tbl_ref;
    private $original_blog;

    private $attrib;
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

    public function get_comment(){
      try {
          $this->query = $this->conn->prepare('select * from tbl_comments inner join tbl_users on tbl_comments.id_user = tbl_users.id_user inner join tbl_levels on tbl_levels.id_level = tbl_users.id_user inner join tbl_blogs on tbl_blogs.id_blog = tbl_comments.original_blog where id_comment = :id_comment && tbl_comments.id_user = :id_user && status_comment > 0');
          $this->query->bindValue(':id_comment', $this->id_comment, PDO::PARAM_INT);
          $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
          $this->query->execute();
          $result = $this->query->fetchAll();
          $this->query = null;
          return $result;
      }catch (PDOException $e) {
          $e->getMessage();
      }
    }

    public function get_comment_simple(){
      try {
          $this->query = $this->conn->prepare('select * from tbl_comments where id_comment = :id_comment && id_user = :id_user');
          $this->query->bindValue(':id_comment', $this->id_comment, PDO::PARAM_INT);
          $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
          $this->query->execute();
          $result = $this->query->fetchAll();
          $this->query = null;
          return $result;
      }catch (PDOException $e) {
          $e->getMessage();
      }
    }

    public function get_comments(){
      try {
        $this->query = $this->conn->prepare('select * from tbl_comments inner join tbl_users on tbl_comments.id_user = tbl_users.id_user inner join tbl_levels on tbl_users.id_level = tbl_levels.id_level inner join tbl_blogs on tbl_blogs.id_blog = tbl_comments.original_blog where tbl_blogs.id_blog = :id_blog && tbl_comments.original_blog = :original_blog && tbl_ref = :tbl_ref && status_comment > 0');
        $this->query->bindValue(':id_blog', $this->id_blog, PDO::PARAM_INT);
        $this->query->bindValue(':tbl_ref', $this->tbl_ref, PDO::PARAM_INT);
        $this->query->bindValue(':original_blog', $this->original_blog, PDO::PARAM_INT);
        $this->query->execute();
        $result = $this->query->fetchAll();
        $this->query = null;
        return $result;
      }catch (PDOException $e) {
        $e->getMessage();
      }
    }

    public function get_comments_admin(){
      try {
        $this->query = $this->conn->prepare('select * from tbl_comments inner join tbl_users on tbl_comments.id_user = tbl_users.id_user inner join tbl_levels on tbl_users.id_level = tbl_levels.id_level inner join tbl_blogs on tbl_blogs.id_blog = tbl_comments.original_blog');
        $this->query->execute();
        $result = $this->query->fetchAll();
        $this->query = null;
        return $result;
      }catch (PDOException $e) {
        $e->getMessage();
      }
    }

    public function get_replies(){
      try {
        $this->query = $this->conn->prepare('select * from tbl_comments inner join tbl_users on tbl_comments.id_user = tbl_users.id_user inner join tbl_levels on tbl_users.id_level = tbl_levels.id_level where tbl_comments.id_blog = :id_blog && tbl_ref = :tbl_ref');
        $this->query->bindValue(':id_blog', $this->id_blog, PDO::PARAM_INT);
        $this->query->bindValue(':tbl_ref', $this->tbl_ref, PDO::PARAM_INT);
        $this->query->execute();
        $result = $this->query->fetchAll();
        $this->query = null;
        return $result;
      }catch (PDOException $e) {
        $e->getMessage();
      }
    }

    public function get_comments_user(){
      try {
        $this->query = $this->conn->prepare('select * from tbl_comments inner join tbl_users on tbl_comments.id_user = tbl_users.id_user inner join tbl_levels on tbl_users.id_level = tbl_levels.id_level inner join tbl_blogs on tbl_blogs.id_blog = tbl_comments.original_blog inner join tbl_themes on tbl_blogs.id_theme = tbl_themes.id_theme where tbl_users.id_user = :id_user');
        $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $this->query->execute();
        $result = $this->query->fetchAll();
        $this->query = null;
        return $result;
      }catch (PDOException $e) {
        $e->getMessage();
      }
    }

    public function get_replies_user(){
      try {
        $this->query = $this->conn->prepare('select * from tbl_comments inner join tbl_users on tbl_comments.id_user = tbl_users.id_user inner join tbl_levels on tbl_users.id_level = tbl_levels.id_level inner join where tbl_users.id_user = :id_user && status_comment > 0 && tbl_ref = 1');
        $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
        $this->query->execute();
        $result = $this->query->fetchAll();
        $this->query = null;
        return $result;
      }catch (PDOException $e) {
        $e->getMessage();
      }
    }

    public function get_num_comments(){
      try {
        $this->query = $this->conn->prepare('select * from tbl_comments where original_blog = :original_blog && status_comment > 0 order by register_comment desc');
        $this->query->bindValue(':original_blog', $this->original_blog, PDO::PARAM_INT);
        $this->query->execute();
        $result = $this->query->rowCount();
        $this->query = null;
        return $result;
      }catch (PDOException $e) {
        $e->getMessage();
      }
    }

    public function delete_comment(){
      try {
          $this->query = $this->conn->prepare('delete from tbl_comments where id_comment = :id_comment && id_user = :id_user');
          $this->query->bindValue(':id_comment', $this->id_comment, PDO::PARAM_INT);
          $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
          $this->query->execute();
          $result = $this->query->rowCount();
          $this->query = null;
          return $result;
      } catch (PDOException $e) {
          $e->getMessage();
      }
    }

    public function delete_comments_replies(){
        try {
            $this->query = $this->conn->prepare('delete from tbl_comments where id_blog = :id_blog && tbl_ref = 1');
            $this->query->bindValue(':id_blog', $this->id_comment, PDO::PARAM_INT);
            $this->query->execute();
            $result = $this->query->rowCount();
            $this->query = null;
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function create_comment(){
        try {
            $this->query = $this->conn->prepare('insert into tbl_comments values (null, :body_comment, null, :status_comment, :id_user, :id_blog, :title_comment, :tbl_ref, :original_blog)');

            $this->query->bindValue(':body_comment', $this->body_comment, PDO::PARAM_INT);
            $this->query->bindValue(':status_comment', 1, PDO::PARAM_INT);
            $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
            $this->query->bindValue(':id_blog', $this->id_blog, PDO::PARAM_INT);
            $this->query->bindValue(':title_comment', $this->title_comment, PDO::PARAM_INT);
            $this->query->bindValue(':tbl_ref', $this->tbl_ref, PDO::PARAM_INT);
            $this->query->bindValue(':original_blog', $this->id_blog, PDO::PARAM_INT);
            $this->query->execute();
            $result = $this->query->rowCount();
            $this->conn = null;
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update_comment(){
        try {
            $this->query = $this->conn->prepare('update tbl_comments set body_comment = :body_comment,  title_comment = :title_comment WHERE id_comment = :id_comment');
            $this->query->bindValue(':id_comment', $this->id_comment, PDO::PARAM_INT);
            $this->query->bindValue(':title_comment', $this->title_comment, PDO::PARAM_INT);
            $this->query->bindValue(':body_comment', $this->body_comment, PDO::PARAM_INT);
            $this->query->execute();
            $result = $this->query->rowCount();
            $this->conn = null;
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update_status_comment(){
        try {
            $this->query = $this->conn->prepare('update tbl_comments set status_comment = :status_comment WHERE id_comment = :id_comment');
            $this->query->bindValue(':id_comment', $this->id_comment, PDO::PARAM_INT);
            $this->query->bindValue(':status_comment', $this->status_comment, PDO::PARAM_INT);
            $this->query->execute();
            $result = $this->query->rowCount();
            $this->conn = null;
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function __clone(){
        trigger_error('Clone option do not allowed!.', E_USER_ERROR);
    }
}
