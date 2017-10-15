<?php
class DBInstaller{
  //Internal Connection Attributs
  protected $conn;
  private $sql;
  private $attrib;
  private $content;
  private $query;

  //External Connection Attributs
  private $db_name;
  private $user;
  private $pass;
  private $host;

  //External Miscellaneous Attributs
  private $id_site;
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

  //External Webmaster Attributs
  private $name_user;
  private $email_user;
  private $pass_user;
  private $sex_user;
  private $web_user;
  private $facebook_user;
  private $twitter_user;
  private $google_user;
  private $linkedin_user;
  private $avatar_user;
  private $salt_user;
  private $id_level;
  private $status_user;
  private $keywords_site;

  //Tables creator
  private $create_tbl_login_attempts;
  private $create_tbl_comments;
  private $create_tbl_blogs;
  private $create_tbl_levels;
  private $create_tbl_miscellaneous;
  private $create_tbl_themes;
  private $create_tbl_users;

  //Methods
  public function set($attrib, $content) {
    $this->$attrib  = $content;
  }

  public function get($attrib) {
    return $this->$attrib;
  }

  public function create_DB(){
    $this->sql = 'mysql:host='.$this->host;
    try {
        $this->conn = new PDO($this->sql, $this->user, $this->pass);
        $this->query = $this->conn->prepare('CREATE DATABASE IF NOT EXISTS '.$this->db_name.' DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci');
        $data = $this->query->execute();
        $this->query = null;
        return $data;
        } catch (PDOException $e) {
        die('ATTENTION: Error connecting to Database. '. $ex->getMessage());
    }
  }

     /*
     If all previous steps are OK, we proceed to create the DB`s tables.

     This blog was designed with a DB with seven (07) tables:
     login_attempts
     tbl_blogs
     tbl_comments
     tbl_levels
     tbl_miscellaneous
     tbl_themes
     tbl_users
     */

  public function create_Tables(){
    $this->sql = 'mysql:host='.$this->host.';dbname='.$this->db_name;
    try{
       $this->conn = new PDO($this->sql, $this->user, $this->pass);

       // ================== tbl_login_attempts

       $this->create_tbl_login_attempts = $this->conn->prepare('CREATE TABLE IF NOT EXISTS login_attempts (id_user int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
         time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
         try int(1) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8');
       $this->create_tbl_login_attempts->execute();
       $this->create_tbl_login_attempts = null;

       // ================== end tbl_login_attempts
       // ================== tbl_blogs
       
      $this->create_tbl_blogs = $this->conn->prepare('CREATE TABLE IF NOT EXISTS tbl_blogs (id_blog int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
         title_blog varchar(250) NOT NULL,
         subtitle_blog varchar(500) NOT NULL,
         register_blog timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
         media_blog varchar(250) NOT NULL,
         id_user int(11) NOT NULL,
         id_theme int(2) NOT NULL,
         status_blog int(1) NOT NULL,
         body_blog varchar(10000) NOT NULL,
         views_blog int(11) NOT NULL,
         likes_blog int(11) NOT NULL,
         kind_media_blog varchar(5) NOT NULL) 
         ENGINE=InnoDB DEFAULT  CHARSET=utf8');
       $this->create_tbl_blogs->execute();
       $this->create_tbl_blogs = null;

       // ================== end tbl_blogs
       // ================== tbl_comments

       $this->create_tbl_comments = $this->conn->prepare('CREATE TABLE IF NOT EXISTS tbl_comments (
         id_comment int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
         body_comment varchar(1500) NOT NULL,
         register_comment timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
         status_comment int(1) NOT NULL,
         id_user int(11) NOT NULL,
         id_blog int(11) NOT NULL,
         title_comment varchar(150) NOT NULL,
         tbl_ref bit(1) NOT NULL,
         original_blog int(11) NOT NULL) 
         ENGINE=InnoDB DEFAULT CHARSET=utf8');
       $this->create_tbl_comments->execute();
       $this->create_tbl_comments = null;

       // ================== end tbl_comments
       // ================== tbl_levels

       $this->create_tbl_levels = $this->conn->prepare('CREATE TABLE IF NOT EXISTS tbl_levels (
        id_level int(1) NOT NULL,
        name_level varchar(20) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8');
        $this->create_tbl_levels->execute();
        $this->create_tbl_levels = null;

        // ================== end tbl_levels
        // ================== add info tbl_levels

        $this->query = $this->conn->prepare("insert into tbl_levels values (0, 'Webmaster'), (1, 'Admin'), (2, 'Member')");
        $this->query->execute();
        $this->query = null;

        //AUTO_INCREMENT PRIMARY KEY

        // ================== end add info tbl_levels
        // ================== tbl_miscellaneous

        $create_tbl_miscellaneous = $this->conn->prepare('CREATE TABLE IF NOT EXISTS tbl_miscellaneous (
         id_site int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
         name_site varchar(100) NOT NULL,
         slogan_site varchar(150) NOT NULL,
         welcome_site varchar(500) NOT NULL,
         maintext_site varchar(330) NOT NULL,
         contact_site char(30) NOT NULL,
         facebook_site varchar(50) NOT NULL,
         google_site varchar(50) NOT NULL,
         linkedin_site varchar(50) NOT NULL,
         youtube_site varchar(50) NOT NULL,
         about_site varchar(40) NOT NULL,
         keywords_site varchar(100) NOT NULL
       ) ENGINE=InnoDB DEFAULT CHARSET=utf8');
       $create_tbl_miscellaneous->execute();
       $create_tbl_miscellaneous = null;

       // ================== end tbl_miscellaneous
       // ================== add info tbl_miscellaneous
       
       $this->query = $this->conn->prepare('insert into tbl_miscellaneous values (null,'
               . ':name_site, '
               . ':slogan_site, '
               . ':welcome_site, '
               . ':maintext_site, '
               . ':contact_site, '
               . ':facebook_site, '
               . ':google_site, '
               . ':linkedin_site, '
               . ':youtube_site, '
               . ':about_site, '
               . ':keywords_site)');
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
       $this->query = null;

       // ================== end add info tbl_miscellaneous
       // ================== tbl_themes

       $this->create_tbl_themes = $this->conn->prepare('CREATE TABLE IF NOT EXISTS tbl_themes (
          id_theme int(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
          theme_blog varchar(30) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8');
        $this->create_tbl_themes->execute();
        $this->create_tbl_themes = null;

        // ================== end tbl_themes
        // ================== add info tbl_themes

        $this->query = $this->conn->prepare("insert into tbl_themes values
        (1, 'Economy'),
        (2, 'Sociology'),
        (3, 'Religion'),
        (4, 'Sports'),
        (5, 'Health'),
        (6, 'Technology'),
        (7, 'Politics'),
        (8, 'Social Networks'),
        (9, 'Internet'),
        (10, 'Family'),
        (11, 'Trends topics'),
        (12, 'Culture'),
        (13, 'Cinema and TV'),
        (14, 'Games'),
        (15, 'Not classified in this list'),
        (16, 'Internet of Things')
        ");
        $this->query->execute();
        $this->query =null;

        // ================== end add info tbl_themes
        // ================== tbl_users

        $this->create_tbl_users = $this->conn->prepare('CREATE TABLE IF NOT EXISTS tbl_users (
          id_user int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
          name_user varchar(30) NOT NULL,
          email_user varchar(30) NOT NULL UNIQUE KEY,
          pass_user varchar(128) NOT NULL,
          sex_user int(1) NOT NULL,
          web_user varchar(40) NOT NULL,
          facebook_user varchar(40) NOT NULL,
          twitter_user varchar(40) NOT NULL,
          google_user varchar(40) NOT NULL,
          linkedin_user varchar(40) NOT NULL,
          avatar_user varchar(40) NOT NULL,
          salt_user varchar(128) NOT NULL,
          register_user timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
          id_level int(1) NOT NULL,
          status_user int(1) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8');
        $this->create_tbl_users->execute();
        $this->create_tbl_users = null;

        // ================== end tbl_users
        // ================== add Webmaster account

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
        $data = $this->query->rowCount();
        $this->query = null;
        return $data;
    } catch (PDOException $e) {
       $e->getMessage();
    }
  } //end function create_tables
} //end Class DBInstaller
