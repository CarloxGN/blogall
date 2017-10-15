<?php
	$pass = $_POST['pass'];
	$register_date = date("Y-m-d H:i:s");
	$status = 'Active';

	/*
	$email,
	$password,
	$username
	$_SESSION['name_site']
	$_SESSION['slogan_site']
	$_SESSION['welcome_site']
	$_SESSION['maintext_site']
	$_SESSION['contact_site']
	$_SESSION['facebook_site']
	$_SESSION['google_site']
	$_SESSION['linkedin_site']
	$_SESSION['youtube_site']
	$_SESSION['twitter_site']
	$_SESSION['about_site']
	$_SESSION['misc'] = 'ready';
	*/

  $message='Hi '.$username.'

Thanks for registering on our blog: '.$_SESSION['title_site'].'.

The status of your registration is active and currently has an assigned member level.

With this level, you will be able to comment on our different published topics. If you wish to publish topics, please send an email to '.$_SESSION['contact_site'].'

Thank you

Best regards.

Webmaster

Team http://www.carlosgonzalez.net.ve

This email was generated electronically and automatically through the page http://www.carlosgonzalez.net.ve.';
	$email_body='<div style="width: 95%; margin: 0 auto; margin-top: 20px;">
      <div class="datagrid"><table>
  ';

$subject = 'Register information';

// HTML sending format
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//Remitent
$headers .= "From: Webmaster <contact@mysite.com>\r\n";

//Reply email
//$headers .= "Reply-To: contact@myblog.com\r\n";

//ruta del mensaje desde origen a destino
$headers .= "Return-path: contact@mysite.com\r\n";

//CC email address
//$headers .= "Cc: ventas@formaelastica.com\r\n";

//extras email address
$headers .= "Bcc: carlox.go@gmail.com\r\n\r\n";

mail($_SESSION['user_correo'],$asunto,$cuerpo,$headers);
mail('pedidos@formaelastica.com',$asunto,$cuerpo,$headers);
