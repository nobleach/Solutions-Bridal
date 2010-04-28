<?php 
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('admin');
	$gown_id = $_GET['gown_id'];
	$sg_query = "SELECT * FROM salegowns WHERE gown_id = $gown_id";
	$sg_rs = mysql_query($sg_query, $conn) or die(mysql_error());
	$sg_record = mysql_fetch_object($sg_rs);
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
					<li><a href="index.php" title="" >Edit Frontpage</a></li>
					<li><a href="edit_collections.php" title="">Edit Collections</a></li>
					<li><a href="edit_photoshoots.php" title="">Edit Photoshoots</a></li>
					<li><a href="edit_sale_gowns.php" title="">Edit Sale Gowns</a></li>
					<li><a href="edit_press.php" title="">Press</a></li>
					<li><a href="email_brides.php" title="">Email Brides</a></li>
				</ul>
			</div>	
			<form enctype="multipart/form-data" action="upload_gown_img.php" method="post" accept-charset="utf-8">
				<table>
					<tr>
						<td><p>Gown Name:</p></td>
						<td>
							<input type="text" name="gown_name" value="<?php echo $sg_record->gown_name; ?>" id="gown_name">
							<input type="hidden" name="gown_id" value="<?php echo $sg_record->gown_id; ?>" id="gown_id">
						</td>
					</tr>
					<tr>
						<td><p>Gown Designer:</p></td>
						<td>
							<input type="text" name="gown_designer" value="<?php echo $sg_record->gown_designer; ?>" id="gown_designer">
						</td>
					</tr>
					<tr>
						<td><p>Gown Desc:</p></td>
						<td>
							<textarea name="gown_desc" rows="8" cols="40">
								<?php echo $sg_record->gown_desc; ?>
							</textarea> 
						</td>
					</tr>
					<tr>
						<td><p>Image:</p></td>
						<td>
							<img src="../salegowns/thumbs/<?php echo $sg_record->gown_img; ?>" />
						</td>
					</tr>
					<tr>
						<td><p>Upload a New Image:</p></td>
						<td>
							<input type="file" name="Filedata" value="" id="Filedata">
						</td>
					</tr>
				</table>
				<br />
				<p class="btnSubmit"><input name="submit" type="submit" value="Submit"></p>
			</form>		
		</div>
	</body>
</html>