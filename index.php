<?php
// If is a new blog, this script will active the install module
include_once 'methods/Controller.php';
if (!defined('WEBSITEPATH')) {
	include 'install/installer.php';
	exit;
}else{
	include_once 'methods/Router.php';
	$login = new controllerLogin();
	$login->newSession();
	$pg = filter_input(INPUT_GET, 'pg', $filter = FILTER_SANITIZE_STRING);
	if ($login->loginCheck() == true) {
			$logged = 'in';
	} else {
			$logged = 'out';
	}

	if(empty($_SESSION['misc'])){
		$misc = new controllerMiscellaneous();

		$misc_data = $misc->listMiscellaneous();
		foreach ($misc_data as $data) {
			$_SESSION['name_site']      = $data['name_site'];
			$_SESSION['slogan_site']    = $data['slogan_site'];
			$_SESSION['welcome_site']   = $data['welcome_site'];
			$_SESSION['maintext_site']	= $data['maintext_site'];
			$_SESSION['contact_site']   = $data['contact_site'];
			$_SESSION['facebook_site']  = $data['facebook_site'];
			$_SESSION['google_site']    = $data['google_site'];
			$_SESSION['linkedin_site']  = $data['linkedin_site'];
			$_SESSION['youtube_site']	= $data['youtube_site'];
			$_SESSION['about_site']     = $data['about_site'];
			$_SESSION['keywords_site']  = $data['keywords_site'];
			$_SESSION['misc'] 			= 'ready';
		}
	}
	if (empty($pg)) {
		header('Location: index.php?pg=start');
	}

	$router = new Router();
	if($router->validGET($pg)){
		$router->chargeViews($pg);
	}
	//include_once 'includes/reports.php';
}
