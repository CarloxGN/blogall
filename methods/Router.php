<?php
class Router {
	public function chargeViews($pg) {
		switch ($pg):
			case 'start':
				include 'views/'.$pg.'.php';
				break;

			case 'admin':
				include 'views/'.$pg.'.php';
				break;

			case 'single':
				include 'views/'.$pg.'.php';
				break;

			case 'login':
				include 'views/'.$pg.'.php';
				break;

			case 'logout':
				include 'views/'.$pg.'.php';
				break;

			case 'contact':
				include 'views/'.$pg.'.php';
				break;

			case 'account':
				include 'views/'.$pg.'.php';
				break;

			case 'listblogs':
				include 'views/'.$pg.'.php';
				break;

			case 'blogsadmin':
				include 'views/'.$pg.'.php';
				break;

			case 'editblog':
				include 'views/'.$pg.'.php';
				break;

			case 'editcomment':
				include 'views/'.$pg.'.php';
				break;

			case 'commentsadmin':
				include 'views/'.$pg.'.php';
				break;

			case 'user':
				include 'views/'.$pg.'.php';
				break;

			case 'createblog':
				include 'views/'.$pg.'.php';
				break;

			case '403':
				include 'views/'.$pg.'.php';
				break;

			case '500':
				include 'views/'.$pg.'.php';
				break;

			case 'login.process':
				include 'bin/'.$pg.'.php';
				break;

			case 'validate':
				include 'bin/'.$pg.'.php';
				break;

			case 'unsuscribe':
				include 'bin/'.$pg.'.php';
				break;

			case 'likes.process':
				include 'bin/'.$pg.'.php';
				break;

			case 'comments.process':
				include 'bin/'.$pg.'.php';
				break;

			case 'addcomment.process':
				include 'bin/'.$pg.'.php';
				break;

			case 'addreply.process':
				include 'bin/'.$pg.'.php';
				break;

			case 'createblog.process':
				include 'bin/'.$pg.'.php';
				break;

			case 'statususer.process':
				include 'bin/'.$pg.'.php';
				break;

			case 'installer':
				include 'install/'.$pg.'.php';
				break;

			default:
				include 'views/404.php';
				break;
		endswitch;
	}

	public function validGET($pg) {
		if (empty($pg)) {
			include_once 'views/start.php';
		} else {
			return true;
		}
	}
}
