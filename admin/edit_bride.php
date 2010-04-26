<?php 
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	$conn = dbConnect('admin');
	$bride_id = $_GET['bride_id'];
	$sg_query = "SELECT * FROM realbrides WHERE bride_id = $bride_id";
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
				<?php include('menu.php'); ?>
			</div>	
			<form enctype="multipart/form-data" action="upload_bride_img.php" method="post" accept-charset="utf-8">
				<table>
					<tr>
						<td><p>Bride Name:</p></td>
						<td>
							<input type="text" name="bride_name" value="<?php echo $sg_record->bride_name; ?>" />
							<input type="hidden" name="bride_id" value="<?php echo $sg_record->bride_id; ?>" />
						</td>
					</tr>
					<tr>
						<td><p>Image:</p></td>
						<td>
							<img src="../brides/thumbs/<?php echo $sg_record->bride_img; ?>" />
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