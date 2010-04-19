<?php 
	session_start();
	if (!isset($_SESSION['authenticated'])) {
		header('Location: login.html');
		exit;
	}
	require_once('includes/conn_mysql.inc.php');	
	if (array_key_exists('submit', $_POST)) {
		$conn = dbConnect('admin');
		foreach($_POST as $key => $value) {
			${$key} = $value;
		}
		$col_desc = mysql_real_escape_string($col_desc);
		$insert_query = "INSERT INTO collections 
							SET col_type = '$col_type', 
							col_name = '$col_name', 
							col_desc = '$col_desc'";
		//echo $insert_query;
		$handle = mysql_query($insert_query, $conn) or die(mysql_error());
		if($handle) {
			$col_id = mysql_insert_id();
			header("Location: upload_collection_images.php?col_id=$col_id");
			exit;
		} else {
			echo 'Error in database insert.';
		}
	}
	
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
					<li><a href="" title="">Edit Sale Gowns</a></li>
					<li><a href="" title="">Press</a></li>
					<li><a href="" title="">Email Brides</a></li>
				</ul>
			</div>	
			<form action="" method="post" accept-charset="utf-8">
				<table>
					<tr>
						<td><p>Collection Type:</p></td>
						<td>
							<select name="col_type">
								<option>BRIDAL</option>
								<option>ATTENDANTS</option>
								<option>ACCESSORIES</option>
								<option>MOMS</option>
								<option>FLOWERGIRLS</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><p>Collection Name:</p></td>
						<td><input type="text" name="col_name" value="" id="col_name"> </td>
					</tr>
					<tr>
						<td>Collection Description:</td>
						<td>
							<textarea name="col_desc" rows="8" cols="40">
								
							</textarea>
						</td>
					</tr>
				</table>
				<br />
				
				<p class="btnSubmit"><input name="submit" type="submit" value="Submit"></p>
			</form>		
		</div>
	</body>
</html>