<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title; ?></title>
<meta name="keywords" content="<?php echo $_SESSION['keywords_site'] ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo WEBSITEPATH;?>images/fav-icon.png"  rel="shortcut icon" type="image/x-icon" />
<link href='https://fonts.googleapis.com/css?family=Michroma' rel='stylesheet' />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?php echo WEBSITEPATH;?>css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo WEBSITEPATH;?>css/login.css" rel='stylesheet' type='text/css' />
<link href="<?php echo WEBSITEPATH;?>css/main.css" rel="stylesheet" type='text/css' />
<link href="<?php echo WEBSITEPATH;?>css/style_tab.css" rel='stylesheet' type='text/css' />

<!----webfonts---->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" type="text/css" media="screen" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script type="text/JavaScript" src="<?=WEBSITEPATH;?>js/sha512.js"></script>
<script type="text/JavaScript" src="<?=WEBSITEPATH;?>js/forms.js"></script>
<script type="text/javascript" src="<?=WEBSITEPATH;?>js/updownmenu.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="<?=WEBSITEPATH;?>js/hidediv.js" charset="utf-8"></script>
<script src="<?=WEBSITEPATH;?>js/closeSession.js" charset="utf-8"></script>
<script src="<?=WEBSITEPATH;?>plugins/tinymce/tinymce.min.js" charset="utf-8"></script>
<script src="<?=WEBSITEPATH;?>js/init-tinyMCE.js" charset="utf-8"></script>
<script type="application/x-javascript">
$(document).ready(function(){
    $('#blogtable').DataTable();
});

addEventListener("load", function() {
  setTimeout(hideURLbar, 0);
}, false);

function hideURLbar(){
  window.scrollTo(0,1);
}
	addEventListener("load", function() {
		setTimeout(hideURLbar, 0);
	}, false);

	function hideURLbar(){
		window.scrollTo(0,1);
	}
</script>
<!---//End-click-drop-down-menu----->
