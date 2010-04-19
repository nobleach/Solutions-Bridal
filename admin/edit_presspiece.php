<?php 
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('admin');
	$press_id = $_GET['press_id'];
	$press_query = "SELECT * FROM press WHERE press_id = $press_id";
	$press_rs = mysql_query($press_query, $conn) or die(mysql_error());
	$press_record = mysql_fetch_object($press_rs);
?>
<!DOCTYPE HTML>
<html>
	<head>
		
		<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<style type="text/css" media="screen">
			table {
				float:left;
				margin-top:20px;
				width: 700px;
			}
			.btnSubmit {
				clear:both;
				float:left;
				margin-top:12px;
			}
		</style>
	</head>
	
	<body>
		<div id="wrapper">
			<h1>ADMIN SECTION: </h1>
			<div id="styletwo">
				<ul>
					<li><a href="index.html" title="" >Edit Frontpage</a></li>
					<li><a href="edit_collections.php" title="">Edit Collections</a></li>
					<li><a href="edit_photoshoots.php" title="">Edit Photoshoots</a></li>
					<li><a href="edit_sale_gowns.php" title="">Edit Sale Gowns</a></li>
					<li><a href="edit_press.php" title="">Press</a></li>
					<li><a href="email_brides.php" title="">Email Brides</a></li>
				</ul>
			</div>	
			<form enctype="multipart/form-data" action="upload_press_img.php" method="post" accept-charset="utf-8">
				<table>
					<tr>
						<td><p>Piece Name:</p></td>
						<td>
							<input type="text" name="press_name" value="<?php echo $press_record->press_name; ?>" id="press_name">
							<input type="hidden" name="press_id" value="<?php echo $press_record->press_id; ?>">
						</td>
					</tr>
					<tr>
						<td><p>Press Desc:</p></td>
						<td>
							<textarea name="press_desc" rows="8" cols="40">
								<?php echo $press_record->press_desc; ?>
							</textarea> 
						</td>
					</tr>
					<tr>
						<td><p>Image:</p></td>
						<td>
							<img src="../press/thumbs/<?php echo $press_record->press_img; ?>" />
						</td>
					</tr>
					<tr>
						<td><p>Upload NEW Image:</p></td>
						<td><input type="file" name="Filedata" value="" id="Filedata"></td>
					</tr>
				</table>
				<br />
				<p class="btnSubmit"><input name="submit" type="submit" value="Submit"></p>
			</form>		
		</div>
	</body>
</html>