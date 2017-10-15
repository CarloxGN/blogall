<?php
include_once 'class/Blogs.class.php';
include_once 'class/Comments.class.php';
include_once 'class/Users.class.php';
include_once 'class/Miscellaneous.class.php';
include_once 'class/Login.class.php';
include_once 'class/Themes.class.php';

class controllerBlogs {
	//Attributs
	private $blog;
	private $status_blog;
	private $limit;

	//Methods
	public function __construct() {
		$this->blog = new Blogs();
	}

	public function createBlog(
		$title_blog,
		$subtitle_blog,
		$media_blog,
		$id_user,
		$id_theme,
		$status_blog,
		$body_blog,
		$views_blog,
		$likes_blog,
		$type_media_blog){
		$this->blog->set('title_blog', $title_blog);
		$this->blog->set('subtitle_blog', $subtitle_blog);
		$this->blog->set('media_blog', $media_blog);
		$this->blog->set('id_user', $id_user);
		$this->blog->set('id_theme', $id_theme);
		$this->blog->set('status_blog', $status_blog);
		$this->blog->set('body_blog', $body_blog);
		$this->blog->set('views_blog', $views_blog);
		$this->blog->set('likes_blog', $likes_blog);
		$this->blog->set('kind_media_blog', $type_media_blog);
		$result = $this->blog->create_blog();
		return $result;
	}

	public function updateBlog($id_user, $id_theme, $status_blog, $kind_media_blog, $media_blog, $title_blog, $subtitle_blog, $body_blog, $likes_blog, $views_blog, $register_blog, $id_blog){
		$this->blog->set('id_user', $id_user);
		$this->blog->set('id_theme', $id_theme);
		$this->blog->set('status_blog', $status_blog);
		$this->blog->set('kind_media_blog', $kind_media_blog);
		$this->blog->set('media_blog', $media_blog);
		$this->blog->set('title_blog', $title_blog);
		$this->blog->set('subtitle_blog', $subtitle_blog);
		$this->blog->set('body_blog', $body_blog);
		$this->blog->set('likes_blog', $likes_blog);
		$this->blog->set('views_blog', $views_blog);
		$this->blog->set('register_blog', $register_blog);
		$this->blog->set('id_blog', $id_blog);
		$result = $this->blog->update_blog();
		return $result;
	}

	public function updateViewsBlog($id_blog){
		$this->blog->set('id_blog', $id_blog);
		$this->blog->update_views_blog();
	}

	public function deleteBlog($id_blog, $id_user) {
		$this->blog->set('id_blog', $id_blog);
		$this->blog->set('id_user', $id_user);
		$this->blog->set('original_blog', $id_blog);
		$this->blog->delete_comments();
		$result = $this->blog->delete_blog();
		if($result == true){
			$this->blog->delete_comments();
			return true;
		}else{
			return false;
		}
	}

	public function deleteBlogs() {
		$this->blog->set('id_user', $_SESSION['user_id']);
		$this->blog->delete_blogs();
	}

	public function listBlog($id) {
		$this->blog->set('id_blog', $id);
		$data = $this->blog->get_blog();
		return $data;
	}

	public function listBlogs() {
		$result = $this->blog->get_blogs();
		return $result;
	}

	public function listBlogsAdmin() {
		$result = $this->blog->get_blogs_admin();
		return $result;
	}

	public function listBlogsByWriter($id_user) {
		$this->blog->set('id_user', $id_user);
		$result = $this->blog->get_blogs_admin();
		return $result;
	}

	public function listBlogsFiltered($string, $limit) {
		$this->blog->set('string', $string);
		$this->blog->set('limit', $limit);
		$result = $this->blog->get_blogs_filtered();
		return $result;
	}

	public function addLike() {
		$this->blog->set('id_blog', $_SESSION['active_blog']);
		$this->blog->update_likes_blog();
		$result = $this->blog->get_blog();
		return $result;
	}

	public function addView() {
		$this->blog->set('id_blog', $_SESSION['active_blog']);
		$this->blog->update_views_blog();
		$result = $this->blog->get_blog();
		return $result;
	}

	public function changeStatusBlog($id, $status){
		$this->blog->set('id_blog', $id);
		$this->blog->set('status_blog', $status);
		$data = $this->blog->update_status_blog();
		return $data;
	}
}

class controllerComments {
	//Atributos
	private $comment;

	//Metodos
	public function __construct() {
		$this->comment = new Comments();
	}

	public function createComment($user, $blog, $title, $body, $tbl_ref) {
		$this->comment->set('id_user', $user);
		$this->comment->set('id_blog', $blog);
		$this->comment->set('title_comment', $title);
		$this->comment->set('body_comment', $body);
		$this->comment->set('tbl_ref', $tbl_ref);
		$result = $this->comment->create_comment();
		return $result;
	}

	public function createReply($user, $blog, $title, $body, $tbl_ref) {
		$this->comment->set('id_user', $user);
		$this->comment->set('id_blog', $blog);
		$this->comment->set('title_comment', $title);
		$this->comment->set('body_comment', $body);
		$this->comment->set('tbl_ref', $tbl_ref);
		$result = $this->comment->create_comment();
		return $result;
	}

	public function listComment($id_comment, $id_user) {
		$this->comment->set('id_comment', $id_comment);
		$this->comment->set('id_user', $id_user);
		$result = $this->comment->get_comment();
		return $result;
	}

	public function listCommentSimple($id_comment, $id_user) {
		$this->comment->set('id_comment', $id_comment);
		$this->comment->set('id_user', $id_user);
		$result = $this->comment->get_comment_simple();
		return $result;
	}

	public function listCommentsAdmin() {
		$result = $this->comment->get_comments_admin();
		return $result;
	}

	public function listComments($id_blog, $ref, $original_blog) {
		$this->comment->set('id_blog', $id_blog);
		$this->comment->set('tbl_ref', $ref);
		$this->comment->set('original_blog', $original_blog);
		$result = $this->comment->get_comments();
		return $result;
	}

	public function listCommentsUser($id_user) {
		$this->comment->set('id_user', $id_user);
		$result = $this->comment->get_comments_user();
		return $result;
	}

	public function numComments($original_blog) {
		$this->comment->set('original_blog', $original_blog);
		$result = $this->comment->get_num_comments();
		return $result;
	}

	public function deleteComment($id_comment, $id_user) {
		$this->comment->set('id_comment', $id_comment);
		$this->comment->set('id_user', $id_user);
		$result = $this->comment->delete_comment();
		return $result;
	}

	public function deleteCommentsReplies($id_comment) {
		$this->comment->set('id_comment', $id_comment);
		$result = $this->comment->delete_comments_replies();
		return $result;
	}

	public function updateComment($body_comment, $title_comment, $id_comment) {
		$this->comment->set('body_comment', $body_comment);
		$this->comment->set('title_comment', $title_comment);
		$this->comment->set('id_comment', $id_comment);
		$result = $this->comment->update_comment();
		return $result;
	}

	public function changeStatusComment($id, $status){
		$this->comment->set('id_comment', $id);
		$this->comment->set('status_comment', $status);
		$data = $this->comment->update_status_comment();
		return $data;
	}
}

class controllerThemes {
	//Attributs
	private $theme;

	//Methods
	public function __construct() {
		$this->theme = new Themes();
	}

	public function listTheme($id_theme) {
		$this->theme->set('id_theme', $id_theme);
		$result = $this->theme->get_comment();
		return $result;
	}

	public function listThemes() {
		$result = $this->theme->get_themes();
		return $result;
	}

	public function createTheme($theme_blog) {
		$this->theme->set('theme_blog', $theme_blog);
		$result = $this->theme->create_theme();
		return $result;
	}

	public function deleteTheme($id_theme) {
		$this->theme->set('id_theme', $id_theme);
		$result = $this->theme->delete_theme();
	}

	public function updateTheme($id_theme) {
		$this->theme->set('id_theme', $id_theme);
		$result = $this->theme->get_theme();
		if($result){
			$result = $this->theme->update_theme();
		}else{
			return false;
		}
	}
}

class controllerUsers {
	private $user;

	public function __construct() {
		$this->user = new Users();
	}

	public function createUser($username,	$email, $password, $sex, $web, $facebook, $twitter,	$linkedin, $google, $avatar, $salt, $idl, $status) {
		$this->user->set('name_user', $username);
		$this->user->set('email_user', $email);
		$this->user->set('pass_user', $password);
		$this->user->set('sex_user', $sex);
		$this->user->set('web_user', $web);
		$this->user->set('facebook_user', $facebook);
		$this->user->set('twitter_user', $twitter);
		$this->user->set('linkedin_user', $linkedin);
		$this->user->set('google_user', $google);
		$this->user->set('avatar_user', $avatar);
		$this->user->set('salt_user', $salt);
		$this->user->set('id_level', $idl);
		$this->user->set('status_user', $status);

		$data = $this->user->insert_user();
	}

	public function updateUser($name,	$email,	$password, $sex,	$web,	$facebook, $twitter,	$google, $linkedin, $avatar, $salt, $status, $id_level, $upd_pass, $id_user) {

		$this->user->set('id_user', $id_user);
		if($upd_pass != true){
			$data = $this->user->get_user_pass();
			foreach ($data as $row) {
				$password = $row['pass_user'];
				$salt = $row['salt_user'];
			}
		}

		$this->user->set('name_user', $name);
		$this->user->set('pass_user', $password);
		$this->user->set('email_user', $email);
		$this->user->set('sex_user', $sex);
		$this->user->set('web_user', $web);
		$this->user->set('facebook_user', $facebook);
		$this->user->set('twitter_user', $twitter);
		$this->user->set('linkedin_user', $linkedin);
		$this->user->set('google_user', $google);
		$this->user->set('avatar_user', $avatar);
		$this->user->set('salt_user', $salt);
		$this->user->set('status_user', $status);
		$this->user->set('id_level', $id_level);
		$data = $this->user->update_user();

		if ($data==true) {
							$user_browser = $_SERVER['HTTP_USER_AGENT'];
							$_SESSION['user_id'] = $id_user;
							$_SESSION['username'] = $name;
							$_SESSION['email_user'] = $email;
							$_SESSION['sex_user'] = $sex;
							$_SESSION['web_user'] = $web;
							$_SESSION['facebook_user'] = $facebook;
							$_SESSION['twitter_user'] = $twitter;
							$_SESSION['google_user'] = $google;
							$_SESSION['linkedin_user'] = $linkedin;
							$_SESSION['avatar_user'] = $avatar;
							$_SESSION['login_string'] = hash('sha512', $password . $user_browser);
		}
		return $data;
		exit;
	}

	public function listUser($user) {
		$this->user->set('id_user', $user);
		$datos = $this->user->get_user();
		return $datos;
	}

	public function listUsers() {
		$data = $this->user->get_users();
		return $data;
	}

	public function deleteUser($id) {
		$this->user->set('id_user', $id);
		$data = $this->user->delete_user();
		return $data;
	}

	public function updateLvlUser($id, $lvl) {
		$this->user->set('id_user', $id);
		$this->user->set('id_level', $lvl);
		$data = $this->user->update_level_user();
		return $data;
	}

	public function changeStatusUser($id, $status){
		$this->user->set('id_user', $id);
		$this->user->set('status_user', $status);
		$data = $this->user->update_status_user();
		return $data;
	}

	public function unsuscribe() {
		$this->user->set('id_user', $_SESSION['user_id']);
		$data = $this->user->delete_user();
	}
}

class controllerMiscellaneous {
	private $miscellaneous;

	public function __construct() {
		$this->miscellaneous = new Miscellaneous();
	}

	public function listMiscellaneous() {
		$data = $this->miscellaneous->get_miscellaneous();
		return $data;
	}

	public function updateMiscellaneous($name, $slogan, $welcome, $maintext, $email, $facebook, $google, $linkedin, $youtube, $about, $keywords){
		$this->miscellaneous->set('name_site', $name);
		$this->miscellaneous->set('slogan_site', $slogan);
		$this->miscellaneous->set('welcome_site', $welcome);
		$this->miscellaneous->set('maintext_site', $maintext);
		$this->miscellaneous->set('contact_site', $email);
		$this->miscellaneous->set('facebook_site', $facebook);
		$this->miscellaneous->set('google_site', $google);
		$this->miscellaneous->set('linkedin_site', $linkedin);
		$this->miscellaneous->set('youtube_site', $youtube);
		$this->miscellaneous->set('about_site', $about);
		$this->miscellaneous->set('keywords_site',	$keywords);
		$data = $this->miscellaneous->update_miscellaneous();
		return $data;
	}
}

class controllerLogin{
	//Attribs
	private $log;

	//Methods
	public function __construct() {
		$this->log = new Login();
	}

	public function newSession(){
		$session_name = 'sec_session_id';
		$secure = $this->log->security_session_start();
		$httponly = true;
		if (ini_set('session.use_only_cookies', 1) === FALSE):
				header("Location: ../index.php?pg=start&er=6");
				exit();
		endif;

		ini_set("session.cookie_lifetime", 0);
		ini_set("session.gc_maxlifetime", 0);

		$cookieParams = session_get_cookie_params();
		session_set_cookie_params($cookieParams["lifetime"],
				$cookieParams["path"],
				$cookieParams["domain"],
				$secure,
				$httponly);
		session_name($session_name);
		session_start();
		session_regenerate_id();
	}

	public function logIn($email,$password){
		  $this->log->set('email_user', $email);
		  $data = $this->log->log_session();
			if ($data != false){
				foreach ($data as $row) {
					# code...
					$id_user 				= $row['id_user'];
					$name_user 			= $row['name_user'];
					$email_user 		= $row['email_user'];
					$pass_user 			= $row['pass_user'];
					$sex_user 			= $row['sex_user'];
					$web_user		 		= $row['web_user'];
					$facebook_user 	= $row['facebook_user'];
					$twitter_user 	= $row['twitter_user'];
					$google_user 		= $row['google_user'];
					$linkedin_user 	= $row['linkedin_user'];
					$avatar_user 		= $row['avatar_user'];
					$salt_user 			= $row['salt_user'];
					$register_user 	= $row['register_user'];
					$id_level 			= $row['id_level'];
					$status_user 		= $row['status_user'];
					if ($status_user==0){
						return 'Your Account Has Been Suspended. Please contact the Webmaster';
					}
					$id_level 			= $row['id_level'];
					$name_level 		= $row['name_level'];
				}
			}else{
				return 'Email not found. Please check your data.';
				exit;
			}

			$password = hash('sha512', $password . $salt_user);
			$now = time();
	    $valid_time = $now - (2 * 60 * 60);
			$this->log->set('id_user', $id_user);
			$this->log->set('valid_attempts', $valid_time);
			$attempts = $this->log->checkbrute();

			if($attempts > 4) {
				return '2';
				exit;
			} else {
				 if ($pass_user == $password) {
									 $user_browser = $_SERVER['HTTP_USER_AGENT'];
									 $_SESSION['user_id'] = $id_user;
									 $_SESSION['username'] = $name_user;
									 $_SESSION['email_user'] = $email_user;
									 $_SESSION['sex_user'] = $sex_user;
									 $_SESSION['web_user'] = $web_user;
									 $_SESSION['facebook_user'] = $facebook_user;
									 $_SESSION['twitter_user'] = $twitter_user;
									 $_SESSION['google_user'] = $google_user;
									 $_SESSION['linkedin_user'] = $linkedin_user;
									 $_SESSION['avatar_user'] = $avatar_user;
									 $_SESSION['register_user'] = $register_user;
									 $_SESSION['status_user'] = $status_user;
									 $_SESSION['name_level'] = $name_level;
									 $_SESSION['id_level'] = $id_level;
									 $_SESSION['last_access'] = time();
									 $_SESSION['login_string'] = hash('sha512', $password . $user_browser);
									 $this->log->set('id_user', $id_user);
									 $this->log->clean_attempts();
									 return '1';
									 exit;
				 } else {
					 $this->log->set('id_user', $id_user);
					 $data = $this->log->register_attempts();
					 $attempts = 4 - $attempts;
					 return 'Wrong password. Remaining attempts: '. $attempts;
					 exit;
				 }
			}
			return 'Error of data';
	}

	public function loginCheck() {
    if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])):

	        $id_user = $_SESSION['user_id'];
					$login_string = $_SESSION['login_string'];
					$name_user = $_SESSION['username'];
					$user_browser = $_SERVER['HTTP_USER_AGENT'];
					$this->log->set('id_user', $id_user);
					$data = $this->log->login_check();
					$accessnow = time();
					$idletime = $accessnow - $_SESSION['last_access'];
					if($idletime >= IDLETIME):
						header('Location: index.php?pg=logout&er=24');
					else:
						$_SESSION['last_access']=time();
					endif;

          if ($data != false):
				foreach ($data as $row):
					$login_check = hash('sha512', $row['pass_user'] . $user_browser);
		            if ($login_check == $login_string):
		              return true;
		            else:
		              return false;
		            endif;
				endforeach;
	        else:
	           return false;
	         endif;
	   else:
	         return false;
	   endif;
	}

	public function esc_url($url) {
	    if ($url == '') {
	        return $url;
	    }

	    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);

	    $strip = array('%0d', '%0a', '%0D', '%0A');
	    $url = (string) $url;

	    $count = 1;
	    while ($count) {
	        $url = str_replace($strip, '', $url, $count);
	    }

	    $url = str_replace(';//', '://', $url);

	    $url = htmlentities($url);

	    $url = str_replace('&amp;', '&#038;', $url);
	    $url = str_replace("'", '&#039;', $url);
		if ($url[0] !== '/') {
	        return '';
	    } else {
	        return $url;
	    }
	}

	public function validateName($username){
		$this->log->set('name_user', $username);
		$result = $this->log->validate_field();
		return $result;
	}

	public function validateNameUpdate($username){
		$this->log->set('name_user', $username);
		$result = $this->log->validate_field_update();
		return $result;
	}

	public function validateEmail($email){
		$this->log->set('email_user', $email);
		$result = $this->log->validate_field();
		return $result;
	}

	public function validateEmailUpdate($email){
		$this->log->set('email_user', $email);
		$result = $this->log->validate_field_update();
		return $result;
	}

	public function closeSession(){
		$action = $log->close();
		return $action;
	}
}

class controllerDBInstaller {
		private $installer;

		public function createDB($host, $user, $pass, $db_name) {
			$this->installer = new DBInstaller();
			$this->installer->set('host', $host);
			$this->installer->set('user', $user);
			$this->installer->set('pass', $pass);
			$this->installer->set('db_name', $db_name);
			$data = $this->installer->create_DB();
			return $data;
		}

		public function createTables(
			$host,
			$user,
			$pass,
			$db_name,
			$name_site,
			$slogan_site,
			$welcome_site,
			$maintext_site,
			$contact_site,
			$facebook_site,
			$google_site,
			$linkedin_site,
			$youtube_site,
			$about_site,
			$keywords_site,
			$name_user,
			$email_user,
			$pass_user,
			$sex_user,
			$web_user,
			$facebook_user,
			$twitter_user,
			$google_user,
			$linkedin_user,
			$avatar_user,
			$salt_user,
			$id_level,
			$status_user) {
		$this->installer = new DBInstaller();
		$this->installer->set('host', $host);
		$this->installer->set('user', $user);
		$this->installer->set('pass', $pass);
		$this->installer->set('db_name', $db_name);
		$this->installer->set('name_site', $name_site);
		$this->installer->set('slogan_site', $slogan_site);
		$this->installer->set('welcome_site', $welcome_site);
		$this->installer->set('maintext_site', $maintext_site);
		$this->installer->set('contact_site', $contact_site);
		$this->installer->set('facebook_site', $facebook_site);
		$this->installer->set('google_site', $google_site);
		$this->installer->set('linkedin_site', $linkedin_site);
		$this->installer->set('youtube_site', $youtube_site);
		$this->installer->set('about_site', $about_site);
		$this->installer->set('keywords_site', $keywords_site);
		$this->installer->set('name_user', $name_user);
		$this->installer->set('email_user', $email_user);
		$this->installer->set('pass_user', $pass_user);
		$this->installer->set('sex_user', $sex_user);
		$this->installer->set('web_user', $web_user);
		$this->installer->set('facebook_user', $facebook_user);
		$this->installer->set('twitter_user', $twitter_user);
		$this->installer->set('google_user', $google_user);
		$this->installer->set('linkedin_user', $linkedin_user);
		$this->installer->set('avatar_user', $avatar_user);
		$this->installer->set('salt_user', $salt_user);
		$this->installer->set('id_level', $id_level);
		$this->installer->set('status_user', $status_user);
		$data = $this->installer->create_Tables();
		return $data;
	}
}

class controllerCreateConfig {
		private $creator;

		public function __construct() {
			$this->creator = new Config_process();
		}

		public function newConfig($database_host, $database_username, $database_name, $database_password, $idle_time, $websitepath, $security) {
			$this->creator->set('database_host', $database_host);
			$this->creator->set('database_username', $database_username);
			$this->creator->set('database_name', $database_name);
			$this->creator->set('database_password', $database_password);
			$idle_time *= 60;
			$this->creator->set('idle_time', $idle_time);
			$this->creator->set('websitepath', $websitepath);
			$this->creator->set('system_security', $security);
			$data = $this->creator->new_config();
			return $data;
		}

		public function newWSPath($websitepath) {
			$this->creator->set('websitepath', $websitepath);
			$data = $this->creator->new_websitepath();
			return $data;
		}
}
