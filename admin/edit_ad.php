<?php 
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('admin');
	$ad_id = $_GET['ad_id'];
	$q_query = "SELECT * FROM ads WHERE ad_id = '$ad_id'";
	$q_rs = mysql_query($q_query, $conn) or die(mysql_error());
	$q_record = mysql_fetch_object($q_rs);
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
			<form enctype="multipart/form-data" action="upload_ad_img.php" method="post" accept-charset="utf-8">
				<table>
					<tr>
						<td>CURRENT AD IMAGE:</td>
						<td>
							<img src="../ads/<?php echo $q_record->ad_img; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							UPLOAD A NEW AD IMAGE:<br />
							<span style="font-size:11px;color:#333;">*IMAGE MUST BE 264x48 PIXELS*</span>
						</td>
						<td>
							<input type="file" name="Filedata" value="" id="ad_img">
						</td>
					</tr>
					<tr>
						<td>LINK URL (if it's a link):</td>
						<td>
							<input type="text" name="ad_link" value="<?php echo $q_record->ad_link; ?>" id="ad_link">
							<input type="hidden" name="ad_id" value="<?php echo $q_record->ad_id; ?>" id="ad_id">
						</td>
					</tr>
				</table>
				<br />
				
				<p class="btnSubmit"><input name="submit" type="submit" value="Submit"></p>
			</form>		
		</div>
	</body>
</html>