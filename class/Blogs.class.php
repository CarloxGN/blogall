<?php
//include 'Database.class.php';
class Blogs{
    private static $instance;
    private $id_blog;
    private $id_user;
    private $register_blog;
    private $id_theme;
    private $status_blog;
    private $media_blog;
    private $title_blog;
    private $subtitle_blog;
    private $body_blog;
    private $views_blog;
    private $likes_blog;
    private $kind_media_blog;
    private $original_blog;

    private $string;
    private $limit;

    private $attrib;
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

    public function get_blogs(){
      try {
        $this->query = $this->conn->prepare('select * from tbl_blogs inner join tbl_users on tbl_blogs.id_user = tbl_users.id_user inner join tbl_themes on tbl_blogs.id_theme = tbl_themes.id_theme inner join tbl_levels on tbl_levels.id_level = tbl_users.id_level where status_blog > 0 order by register_blog');

      	$this->query->execute();
    		$result = $this->query->fetchAll();
        $this->query = null;
        return $result;
      }catch (PDOException $e) {
          $e->getMessage();
      }
    }

    public function get_blogs_admin(){
      try {
        $this->query = $this->conn->prepare('select * from tbl_blogs inner join tbl_users on tbl_blogs.id_user = tbl_users.id_user inner join tbl_themes on tbl_blogs.id_theme = tbl_themes.id_theme inner join tbl_levels on tbl_levels.id_level = tbl_users.id_level order by tbl_blogs.id_user');

      	$this->query->execute();
    		$result = $this->query->fetchAll();
        $this->query = null;
        return $result;
      }catch (PDOException $e) {
          $e->getMessage();
      }
    }

    public function get_blogs_by_writer(){
      try {
        $this->query = $this->conn->prepare('select * from tbl_blogs inner join tbl_users on tbl_blogs.id_user = tbl_users.id_user inner join tbl_themes on tbl_blogs.id_theme = tbl_themes.id_theme inner join tbl_levels on tbl_levels.id_level = tbl_users.id_level where tbl_blogs.id_user = :id_user order by register_blog');

      	$this->query->execute();
        $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
    		$result = $this->query->fetchAll();
        $this->query = null;
        return $result;
      }catch (PDOException $e) {
          $e->getMessage();
      }
    }

    public function get_blogs_filtered(){
      try {
        $this->query = $this->conn->prepare('select * from tbl_blogs inner join tbl_users on tbl_blogs.id_user = tbl_users.id_user inner join tbl_themes on tbl_blogs.id_theme = tbl_themes.id_theme inner join tbl_levels on tbl_levels.id_level = tbl_users.id_level where (body_blog like :string || title_blog like :string || subtitle_blog like :string || name_user like :string || subtitle_blog like :string) && status_blog > 0 order by register_blog limit :limit');

        $this->query->bindValue(':string',   '%' . $this->string . '%', PDO::PARAM_INT);
        $this->query->bindValue(':limit', $this->limit, PDO::PARAM_INT);
      	$this->query->execute();
    		$result = $this->query->fetchAll();
        $this->query = null;
        return $result;
      }catch (PDOException $e) {
          $e->getMessage();
      }
    }

    public function get_blog(){
        try {
            $this->query = $this->conn->prepare('select * from tbl_blogs inner join tbl_users on tbl_blogs.id_user = tbl_users.id_user inner join tbl_themes on tbl_blogs.id_theme = tbl_themes.id_theme inner join tbl_levels on tbl_levels.id_level = tbl_users.id_level where id_blog = :id_blog && status_blog > 0');
            $this->query->bindValue(':id_blog', $this->id_blog, PDO::PARAM_INT);
            $this->query->execute();
            $result = $this->query->fetchAll();
            $this->query = null;
            return $result;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function delete_blog(){
        try {
            $this->query = $this->conn->prepare('delete from tbl_blogs where id_blog = :id_blog && id_user = :id_user');
            $this->query->bindValue(':id_blog', $this->id_blog, PDO::PARAM_INT);
            $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
            $this->query->execute();
            $count = $this->query->rowCount();
            $this->query = null;
            return $count;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function delete_blogs(){
        try {
            $this->query = $this->conn->prepare('delete from tbl_blogs where id_user = :id_user');
            $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
            $this->query->execute();
            $this->query = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function delete_comments(){
        try {
            $this->query = $this->conn->prepare('delete from tbl_comments where original_blog = :original_blog');
            $this->query->bindValue(':original_blog', $this->original_blog, PDO::PARAM_INT);
            $this->query->execute();
            $this->query = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function create_blog(){
        try {
            $this->query = $this->conn->prepare('insert into tbl_blogs values (null, :title_blog, :subtitle_blog, null, :media_blog, :id_user, :id_theme, :status_blog, :body_blog, :views_blog, :likes_blog, :kind_media_blog)');
            $this->query->bindValue(':title_blog', $this->title_blog, PDO::PARAM_INT);
            $this->query->bindValue(':subtitle_blog', $this->subtitle_blog, PDO::PARAM_INT);
            $this->query->bindValue(':media_blog', $this->media_blog, PDO::PARAM_INT);
            $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
            $this->query->bindValue(':id_theme', $this->id_theme, PDO::PARAM_INT);
            $this->query->bindValue(':status_blog', $this->status_blog, PDO::PARAM_INT);
            $this->query->bindValue(':body_blog', $this->body_blog, PDO::PARAM_INT);
            $this->query->bindValue(':views_blog', $this->views_blog, PDO::PARAM_INT);
            $this->query->bindValue(':likes_blog', $this->likes_blog, PDO::PARAM_INT);
            $this->query->bindValue(':kind_media_blog', $this->kind_media_blog, PDO::PARAM_INT);
            $this->query->execute();
            $result = $this->query->rowCount();
            $this->query = null;
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update_blog(){
        try {
            $this->query = $this->conn->prepare('
            update tbl_blogs set
              title_blog = :title_blog,
              subtitle_blog = :subtitle_blog,
              register_blog = :register_blog,
              media_blog = :media_blog,
              id_user = :id_user,
              id_theme = :id_theme,
              status_blog = :status_blog,
              body_blog = :body_blog,
              views_blog = :views_blog,
              likes_blog = :likes_blog,
              kind_media_blog = :kind_media_blog
            where id_blog = :id_blog'
          );

            $this->query->bindValue(':title_blog', $this->title_blog, PDO::PARAM_INT);
            $this->query->bindValue(':subtitle_blog', $this->subtitle_blog, PDO::PARAM_INT);
            $this->query->bindValue(':register_blog', $this->register_blog, PDO::PARAM_INT);
            $this->query->bindValue(':media_blog', $this->media_blog, PDO::PARAM_INT);
            $this->query->bindValue(':id_user', $this->id_user, PDO::PARAM_INT);
            $this->query->bindValue(':id_theme', $this->id_theme, PDO::PARAM_INT);
            $this->query->bindValue(':status_blog', $this->status_blog, PDO::PARAM_INT);
            $this->query->bindValue(':body_blog', $this->body_blog, PDO::PARAM_INT);
            $this->query->bindValue(':views_blog', $this->views_blog, PDO::PARAM_INT);
            $this->query->bindValue(':likes_blog', $this->likes_blog, PDO::PARAM_INT);
            $this->query->bindValue(':kind_media_blog', $this->kind_media_blog, PDO::PARAM_INT);
            $this->query->bindValue(':id_blog', $this->id_blog, PDO::PARAM_INT);
            $this->query->execute();
            $result = $this->query->rowCount();
            $this->query = null;
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update_views_blog(){
        try {
            $this->query = $this->conn->prepare('update tbl_blogs set views_blog = views_blog+1 where id_blog = :id_blog');
            $this->query->bindValue(':id_blog', $this->id_blog, PDO::PARAM_INT);
            $this->query->execute();
            $result = $this->query->rowCount();
            $this->query = null;
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update_likes_blog(){
        try {
            $this->query = $this->conn->prepare('update tbl_blogs set likes_blog = likes_blog+1 where id_blog = :id_blog');
            $this->query->bindValue(':id_blog', $this->id_blog, PDO::PARAM_INT);
            $this->query->execute();
            $result = $this->query->rowCount();
            $this->query = null;
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update_status_blog(){
        try {
          $this->query = $this->conn->prepare('update tbl_blogs set status_blog = :status_blog where id_blog = :id_blog');
          $this->query->bindValue(':status_blog', $this->status_blog, PDO::PARAM_INT);
          $this->query->bindValue(':id_blog', $this->id_blog, PDO::PARAM_INT);
          $this->query->execute();
          $result = $this->query->rowCount();
          $this->query = null;
          return $result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function __clone(){
        trigger_error('Clone option do not allowed!.', E_USER_ERROR);
    }
}
