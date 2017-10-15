<?php
if (!isset($_SESSION['id_level'])):
		header ('Location: ?pg=start&er=4');
		exit;
elseif($_SESSION['id_level'] != 2):
		header ('Location: ?pg=start&er=25');
		exit;
else:
	$title = $_SESSION['name_site'].' | Concepto de pago ejecutado';
?>
<!DOCTYPE html>
<html>
<head>
<?php
include_once('includes/head.php');
?>
</head>
		<!---start-wrap---->
			<!---start-header---->
		<?php include 'includes/header.php'; ?>
		<!---End-header---->
		<!---start-content---->
		<div>
			<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
		</div>
		<div class="content">
			<div class="wrap">
				<div class="contact-info">
					<div class="account_grid">
						<div class="container">
			<div class="info alert-info" style="font-size:10px; width:65%; position: right">
				<span style="color:red">Importante:</span> Si desea realizar un reporte de pago no listado en la siguiente tabla por favor cont&aacute;cte a la Administraci&oacute;n en caja para m&aacute;s informaci&oacute;n</div>
			<br>&nbsp;</p>
				<div align="center">
					<p style="font-face: italic; font-size: 14px;">
						Conceptos Acad&eacute;micos 
					</p>
				</div>

			<p>&nbsp;</p>
				 <div class="clearfix"></div>
				 <div class="col-md-12 login-right form-signin form-login">
				 <table id="blogtable" class="display" cellspacing="0" width="100%" style="font-size:11px">
				 <thead>
				 <tr>
					 <th style="text-align: center">C&oacute;digo</th>
					 <th style="text-align: center">Descripci&oacute;n</th>
					 <th style="text-align: center">Modelo</th>
					 <th style="text-align: center">Costo</th>
				 </tr>
				 </thead><tbody>
				<?php
				$concepts = new controllerConcepts();
				$result = $concepts->listConcepts();
				foreach ($result as $row){
					echo '<tr><td style="font-size:11px;cursor: pointer;" onclick="window.location =\''.WEBSITEPATH.'?pg=createreport&id='.$row['id_concept'].'&title='.$row['description_concept'].'\'">&nbsp;&nbsp;&nbsp;<a href="?pg=createreport&id='.$row['id_concept'].'&title='.$row['description_concept'].'..."  title="Reporte de: '.$row['description_concept'].'">'.str_replace('&', $_SESSION['active_year'], $row['code_concept']).'</a>';
					echo '</td><td style="text-align: center;font-size:10px;text-align: left;">';
					if($row['status_blog'] == 0){
						echo '<span style="color: red">Suspendido</span>';
					}else{
						echo '<span style="color: green">Activo</span>';
					}
						echo '<td style="text-align: center;font-size:10px">'.date("d-m-Y H:m:s", strtotime($row['register_blog'])).'</td><td>&nbsp;&nbsp;'.$row['theme_blog'].'</td>
							<td>
							<form method="post" action="">
							<input type="hidden" value="'.$row['id_blog'].'" name="id" />
							 <a href="?pg=editblog&id='.$row['id_blog'].'&title='.$row['title_blog'].'" title="Update blog: '.$row['title_blog'].'" >
								<img src="'.WEBSITEPATH.'images/update.png"/>
							 </a>&nbsp;&nbsp;
							<button type="submit" class="no_button" name="delete_button" title="Borrar: '.$row['title_blog'].'" onclick="return confirm(\'Desea borrar este reporte? Una vez ejecutado no podrá deshacerlo\')">
								<img src="'.WEBSITEPATH.'images/trash.png"/>
							</button>
							</form></td></tr>';
				}
			 	?>
			 	</tbody></table></div>
				<div style="font-size:14px;align:center;">
					<a href="?pg=start">Regresar al Men&uacute; Principal</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"> </div>
</div>
	<div class="background:url(images/border.png) repeat-x 0px 0px #FFF">
	<!---//End-content---->
	<!----wookmark-scripts---->
	<script src="js/jquery.imagesloaded.js"></script>
	<script src="js/jquery.wookmark.js"></script>
	<script src="js/blog.scripts.js"type="text/javascript"></script>
	<!-- --//wookmark-scripts-- -->
	<!-- --start-footer- -->
	<?php include_once 'includes/footer.php' ?>
	<!-- --//End-footer- -->
	<!-- -//End-wrap-- -->
	</body>
</html>
<?php endif;?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
