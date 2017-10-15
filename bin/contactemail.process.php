<?php
 	$titlesite = $_SESSION['name_site'];
	$email_contact = $_SESSION['contact_site'];
	$correo = $email;
	$facebook_site = $_SESSION['facebook_site'];
	$google_site = $_SESSION['google_site'];
	$slogan_site = $_SESSION['slogan_site'];

	$bdy='<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>'.$titlesite.' | Contact email</title>
	<link href="https://fonts.googleapis.com/css?family=Michroma" rel="stylesheet" />
	<style>
	.bd{
	  font-family:Michroma;
	}
	</style>
	</head>
	<body>
	<div style="width:100%;" align="center" class="bd">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	  <td align="center" valign="top" style="background-color:#53636e;" bgcolor="#53636e;">
	  <br>
	  <br>
	  <table width="583" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td align="left" valign="top" bgcolor="#FFFFFF" style="background-color:#FFFFFF;"><img src="'.WEBSITEPATH.'images/header.jpg" width="583" height="118"></td>
	    </tr>
	  <tr>
	  <td align="left" valign="top" bgcolor="#FFFFFF" style="background-color:#FFFFFF;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	  <td width="35" align="left" valign="top">&nbsp;</td>
	  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td align="center" valign="top">
	      	<h2>'.$_SESSION['name_site'].'</h2>
	        <div style="color:#898989; font-size:12px;">'.date("Y-m-d H:m:s").'</div></td>
	    </tr>
	    <tr>
	      <td align="left" valign="top"><img src="'.WEBSITEPATH.'images/pic1.jpg" width="512" height="296" vspace="10"></td>
	    </tr>
	    <tr>
	      <td align="left" valign="top">
	      <div style="color:#3482ad; font-size:12px; align: right">
	      <p>
	        Hi '.$name.',
	      </p>
	    <p>
	    Thank you for contacting us in our thematic blog: '.$_SESSION['name_site'].'.
	    </p>
	    <p>Your send us this message:<br><br>
	    Contact date: '.date("Y-m-d H:i:s").'
      <p align="justify">
      <hr>
      <h3>Subject:</h3>
      '.$subject.'
      <p>
      <h3>Message:</h3>
      '.$message.'
	    </p>
	    <hr>
      <p>If your message require and answer, We will contacting you as soon as possible, and again thaks for using this contact service.</p>
      <p>
      Best Regards!</p>
	    <p>
	    Webmaster <br>
	    Team '.WEBSITEPATH.'
	    </p>
	  </div>
	  <p style="font-size:12px;" align="right">
	  This email was generated automatically through the page<br>'.WEBSITEPATH.'
	  </p><br>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <td width="13%">
	      <a href="https://www.facebook.com/'.$_SESSION['facebook_site'].'">
	        <img src="'.WEBSITEPATH.'images/facebook.gif" alt="" width="24" height="23">
	    </a>
      &nbsp;&nbsp;
	    <a href="https://plus.google.com/u/0/+'.$_SESSION['google_site'].'">
	      <img src="'.WEBSITEPATH.'images/ggl+.png" alt="" width="24" height="23">
	    </a>
		</td>
	    <td width="87%" style="font-size:11px; color:#525252;"><b>Webmaster online hours: Mon-Fri 9:30-5:30, Sat. 9:30-3:00, Sun. Offline <br>
	      Members Support: '.$email.'</b></td>
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
	'.$_SESSION['slogan_site'].'</span></td>
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

$subj = 'Thank you for contacting us through our blogsite';

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//remitent
$headers .= "From: Webmaster $titlesite <engineer@carlosgonzalez.net.ve>\r\n";

//Asnwer addr, if it is dif to source
$headers .= "Reply-To: carl.gon@cantv.net\r\n";

//IO addr
$headers .= "Return-path: carlox.go@gmail.com\r\n";

//Cc addr
$headers .= "Cc: carlox.go@gmail.com\r\n";

//Cco addr
//$headers .= "Bcc: hide_email@your_blogall_site.com\r\n\r\n";

mail($correo,$subj,$bdy,$headers);
