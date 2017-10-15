<?php
 	$titlesite = "Internet of Things";
	$user_name = "Carlos";
	$email_contact = 'engineer@carlosgonzalez.net.ve';
	$pass = "frizzbe";
	$correo = 'carlox.go@gmail.com';
	$facebook_site = 'carloshgonzalezn';
	$twitter_site = 'engcarlos';
	$slogan_site = "If you think that the internet has changed your life, think again. The IoT is about to change it all over again!";
	define("__WEBSITEPATH__","http://carlosgonzalez.net.ve/blogall/email_format/");

	$cuerpo='<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Register email</title>
	<link href="https://fonts.googleapis.com/css?family=Michroma" rel="stylesheet" />
	<style>
	body{
	  font-family:Michroma;
	}
	</style>
	</head>
	<body>
	<div style="width:100%;" align="center">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	  <td align="center" valign="top" style="background-color:#53636e;" bgcolor="#53636e;">
	  <br>
	  <br>
	  <table width="583" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td align="left" valign="top" bgcolor="#FFFFFF" style="background-color:#FFFFFF;"><img src="'.__WEBSITEPATH__.'images/header.jpg" width="583" height="118"></td>
	    </tr>
	  <tr>
	  <td align="left" valign="top" bgcolor="#FFFFFF" style="background-color:#FFFFFF;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	  <td width="35" align="left" valign="top">&nbsp;</td>
	  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td align="center" valign="top">
	      	<h2>'.$titlesite.'</h2>
	        <div style="color:#898989; font-size:12px;">'.date("d-m-Y H:m:s").'</div></td>
	    </tr>
	    <tr>
	      <td align="left" valign="top"><img src="'.__WEBSITEPATH__.'images/pic1.jpg" width="512" height="296" vspace="10"></td>
	    </tr>
	    <tr>
	      <td align="left" valign="top">
	      <div style="color:#3482ad; font-size:12px; align: right">
	      <p>
	        Hi '.$user_name.',
	      </p>
	    <p>
	    Thanks for registering on our thematic blog: '.$titlesite.'.
	    </p>
	    <p>Your account data is:<br>
	    USER: '.$correo.'
	    <br>
	    PASSWORD: '.$pass.'
	    <br>
	    REGISTER DATE: '.date("Y-m-d H:i:s").'
	    <p align="justify">
	    The status of your registration is "active" and currently has a level of MEMBER.
	    With this level, you will be able to comment in our different published topics. If you wish to publish topics, please send an email to '.$email_contact.' and request this option.
	    </p>
	    <p>
	    Best regards.
	    </p>
	    <p>
	    Webmaster <br>
	    Team '.__WEBSITEPATH__.'
	    </p>
	    <hr>
	  </div>
	  <p style="font-size:10px;" align="right">
	  This email was generated automatically through the page<br>'.__WEBSITEPATH__.'
	  </p><br>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <td width="13%"><b>
	      <a href="https://www.youtube.com/'.$facebook_site.'">
	        <img src="'.__WEBSITEPATH__.'images/facebook.gif" alt="" width="24" height="23"></b></td>
	    </a><br>
	    <a href="https://www.twitter.com/'.$twitter_site.'">
	      <img src="'.__WEBSITEPATH__.'images/tweet.gif" alt="" width="24" height="23">
	    </a>
			</td>

	    <td width="87%" style="font-size:11px; color:#525252;"><b>Webmaster online hours: Mon-Fri 9:30-5:30, Sat. 9:30-3:00, Sun. Offline <br>
	      Members Support: '.$email_contact.'</b></td>
	  </tr>
	</table></td>
	              </tr>
	              <tr>
	                <td align="left" valign="top" style="font-size:12px; color:#525252;">&nbsp;</td>
	              </tr>
	            </table></td>
	            <td width="35" align="left" valign="top">&nbsp;</td>
	          </tr>
	        </table></td>
	      </tr>
	      <tr>
	        <td align="left" valign="top" bgcolor="#3d90bd" style="background-color:#3d90bd;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	          <tr>
	            <td width="35">&nbsp;</td>
	            <td height="50" valign="middle" style="color:#FFFFFF; font-size:10px;"><b>Slogan:</b><br><span style="font-size:9px;">
	'.$slogan_site.'</span></td>
	            <td width="35">&nbsp;</td>
	          </tr>
	        </table></td>
	      </tr>
	  </table>
	    <br>
	    <br></td>
	  </tr>
	</table>
	</div>
	</body>
	</html>';

$asunto = 'Thank you for registering in our blog';

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//remitent
$headers .= "From: Webmaster $titlesite <engineer@carlosgonzalez.net.ve>\r\n";

//Asnwer addr, if it is dif to source
$headers .= "Reply-To: carl.gon@cantv.net\r\n";

//IO addr
$headers .= "Return-path: carlox.go@gmail.com\r\n";

//Cc addr
//$headers .= "Cc: ventas@formaelastica.com\r\n";

//Cco addr
$headers .= "Bcc: carl.go@cantv.net\r\n\r\n";

mail($correo,$asunto,$cuerpo,$headers);
