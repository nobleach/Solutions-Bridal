<?php 
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');
	$col_id = $_GET['col_id'];
	$conn = dbConnect('admin');
	$collection_query = "SELECT * FROM collections WHERE col_id = $col_id";
	$collection_rs = mysql_query($collection_query, $conn) or die(mysql_error());
	$collection_record = mysql_fetch_object($collection_rs);
	
	$type_query = "SELECT DISTINCT col_type FROM collections";
	$type_rs = mysql_query($type_query, $conn) or die(mysql_error());
	
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
					<li><a class="current" href="edit_collections.php" title="">Edit Collections</a></li>
					<li><a href="edit_photoshoots.php" title="">Edit Photoshoots</a></li>
					<li><a href="" title="">View Measurements</a></li>
					<li><a href="" title="">Newsletter</a></li>
				</ul>
			</div>	
			<form action="edit_collection_submit.php" method="post" accept-charset="utf-8">
				<table>
					<tr>
						<td><p>Collection Type:</p></td>
						<td>
							<select name="col_type">
								<?php
									while ($type_record = mysql_fetch_assoc($type_rs)) {
										echo '<option';
										if ($type_record['col_type'] == $collection_record->col_type) {
											echo ' selected';
										}
										echo ' value="'.$type_record['col_type'].'">'.$type_record['col_type'].'</option>';
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td><p>Collection Name:</p></td>
						<td><input type="text" name="col_name" value="<?php echo $collection_record->col_name; ?>" id="col_name"> </td>
					</tr>
					<tr>
						<td>Collection Description:</td>
						<td>
							<textarea name="col_desc" rows="8" cols="40">
								<?php echo $collection_record->col_desc;?>
							</textarea>
						</td>
					</tr>
				</table>
				<br />
				<input type="hidden" name="col_id" value="<?php echo $collection_record->col_id; ?>" id="col_id">
				<p class="btnSubmit"><input name="submit" type="submit" value="Submit"></p>
			</form>		
		</div>
	</body>
</html>